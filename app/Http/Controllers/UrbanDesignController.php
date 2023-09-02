<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Models\UrbanDesign;

class UrbanDesignController extends Controller
{
    // add a work
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|string',
            'title' => 'required|string',
            'place' => 'required|string',
            'year' => 'required|integer',
            'description' => 'nullable|string',
            'monogram' => 'required|image|mimes:jpeg,jpg,png,gif|dimensions:width=69,height=64',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png,gif|dimensions:with=512,height=240'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }
        
        try {
            $originalFilename = $request->file('monogram')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('monogram')->getClientOriginalExtension();
            $monogramPath = 'uploads/works/monograms/' . $filename;
            $request->file('monogram')->storeAs('public/' . $monogramPath);

            $originalFilename = $request->file('thumbnail')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnailPath = 'uploads/works/thumbnails/' . $filename;
            $request->file('thumbnail')->storeAs('public/' . $thumbnailPath);

            $order = $request->input('order');
            $orderParts = preg_split('/(?<=\d)(?=[A-Za-z])/', $order, 2);
            $orderValue = $orderParts[0] ?? '';
            $orderSuffix = $orderParts[1] ?? '';

            $work = new UrbanDesign();
            $work->order = $orderValue;
            $work->order_suffix = $orderSuffix;
            $work->title = $request->input('title');
            $work->place = $request->input('place');
            $work->year = $request->input('year');
            $work->description = $request->input('description');
            $work->monogram = $monogramPath;
            $work->thumbnail = $thumbnailPath;

            $work->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully added to urban designs.'
            ], 200);
            // return redirect()->route('homes')->with('success', 'Successfully added to urban designs.');
        } 
        catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding work.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    // edit a work
    public function edit(Request $request, $id)
    {
        $work = UrbanDesign::find($id);

        if(!$work)
        {
            return response()->json([
                'status' => false,
                'message' => 'Urban Design Not Found.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'place' => 'nullable|string',
            'year' => 'nullable|integer',
            'description' => 'nullable|string',
            'monogram' => 'nullable|image|mimes:jpeg,jpg,png,gif|dimensions:width=69,height=64',
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,gif|dimensions:with=512,height=240'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }

        $updatedData = [];

        if($request->filled('order'))
        {
            $order = $request->input('order');
            $orderParts = preg_split('/(?<=\d)(?=[A-Za-z])/', $order, 2);
            $orderValue = $orderParts[0] ?? '';
            $orderSuffix = $orderParts[1] ?? '';
            $updatedData['order'] = $orderValue;
            $updatedData['order_suffix'] = $orderSuffix;
        }

        if($request->filled('title'))
        {
            $updatedData['title'] = $request->input('title');
        }
        
        if($request->filled('place'))
        {
            $updatedData['place'] = $request->input('place');
        }

        if($request->filled('year'))
        {
            $updatedData['year'] = $request->input('year');
        }

        if($request->filled('description'))
        {
            $updatedData['description'] = $request->input('description');
        }

        if($request->hasFile('monogram'))
        {
            $originalFilename = $request->file('monogram')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('monogram')->getClientOriginalExtension();
            $monogramPath = 'uploads/works/monograms/' . $filename;
            $request->file('monogram')->storeAs('public/' . $monogramPath);
            $updatedData['monogram'] = $monogramPath;
        }

        if($request->hasFile('thumbnail'))
        {
            $originalFilename = $request->file('thumbnail')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnailPath = 'uploads/works/thumbnails/' . $filename;
            $request->file('thumbnail')->storeAs('public/' . $thumbnailPath);
            $updatedData['thumbnail'] = $thumbnailPath;
        }

        if(empty($updatedData))
        {
            return response()->json([
                'status' => 'true',
                'message' => 'Nothing to Update.'
            ], 200);
            // return redirect()->route('edit.work', $id)->with('success', 'Nothing to update.'); 
        }

        try {
            $work->update($updatedData);

            return response()->json([
                'status' => true,
                'message' => 'Updated Successfully.'
            ], 200);
            // return redirect()->route('edit.work', $id)->with('success', 'Successfully updated.');
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error trying to update.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    // delete a work
    public function delete($id)
    {
        try {
            $work = UrbanDesign::findOrFail($id);

            $work->gallery()->where('urbandesign_id', $id)->delete();

            $work->delete();

            return response()->json([
                'status' => true,
                'message' => 'Deleted work successfully.'
            ], 200);
            // return redirect()->route('homes')->with('success', 'Work successfully deleted.');
        }
        catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Work not found.'
            ], 400);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
