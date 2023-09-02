<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AwardsController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }

        $imagePath = null;
        if($request->hasFile('image'))
        {
            $originalFilename = $request->file('image')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = 'uploads/office/aboutus/' . $filename;
            $request->file('image')->storeAs('public/' . $imagePath);
        }

        try {
            $order = $request->input('order');
            $orderParts = preg_split('/(?<=\d)(?=[A-Za-z])/', $order, 2);
            $orderValue = $orderParts[0] ?? '';
            $orderSuffix = $orderParts[1] ?? '';

            $award = new Award();
            $award->order = $orderValue;
            $award->order_suffix = $orderSuffix;
            $award->name = $request->input('name');
            $award->description = $request->input('description');
            $award->image = $imagePath;

            $award->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully added to awards.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding award.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $award = Award::find($id);

        if(!$award)
        {
            return response()->json([
                'status' => false,
                'message' => 'Data not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'order' => 'nullable|string',
            'name' => 'nullable|string',
            'description' => 'nullable|string' ,
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);
            
        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation error.',
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

        if($request->filled('name'))
        {
            $updatedData['name'] = $request->input('name');
        }

        if($request->filled('description'))
        {
            $updatedData['description'] = $request->input('description');
        }

        if($request->hasFile('image'))
        {
            $originalFilename = $request->file('image')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = 'uploads/office/aboutus/' . $filename;
            $request->file('image')->storeAs('public/' . $imagePath);
            $updatedData['image'] = $imagePath;
        }

        if(empty($updatedData))
        {
            return response()->json([
                'status' => true,
                'message' => 'Nothing to update.'
            ], 200);
        }

        try {
            $award->update($updatedData);

            return response()->json([
                'status' => true,
                'message' => 'Awards updated successfully.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error trying to update awards',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function delete($id)
    {
        try{
            $award = Award::findOrFail($id);

            $award->delete();

            return response()->json([
                'status' => true,
                'message' => 'Award deleted successfully.'
            ], 200);
        }
        catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Award not found',
                'error' => 'Error: ' . $e->getMessage()
            ], 404);
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
