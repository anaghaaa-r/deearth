<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }

        $thumbnailPath = null;

        if($request->hasFile('thumbnail'))
        {
            $originalFilename = $request->file('thumbnail')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnailPath = 'uploads/office/aboutus/' . $filename;
            $request->file('thumbnail')->storeAs('public/' . $thumbnailPath);
        }

        try {
            $aboutus = new AboutUs();
            $aboutus->title = $request->input('title');
            $aboutus->subtitle = $request->input('subtitle');
            $aboutus->description = $request->input('description');
            $aboutus->thumbnail = $thumbnailPath;

            $aboutus->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully added about us.',
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding about us.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $aboutus = AboutUs::find($id);

        if(!$aboutus)
        {
            return response()->json([
                'status' => false,
                'message' => 'Data not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,gif'
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

        if($request->filled('title'))
        {
            $updatedData['title'] = $request->input('title');
        }

        if($request->filled('subtitle'))
        {
            $updatedData['subtitle'] = $request->input('subtitle');
        }

        if($request->filled('description'))
        {
            $updatedData['description'] = $request->input('description');
        }

        if($request->hasFile('thumbnail'))
        {
            $originalFilename = $request->file('thumbnail')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnailPath = 'uploads/office/aboutus/' . $filename;
            $request->file('thumbnail')->storeAs('public/' . $thumbnailPath);
            $updatedData['thumbnail'] = $thumbnailPath;
        }

        if(empty($updatedData))
        {
            return response()->json([
                'status' => true,
                'message' => 'Nothing to Update.'
            ], 200);
        }

        try {
            $aboutus->update($updatedData);

            return response()->json([
                'status' => true,
                'message' => 'About us updated successfully.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error trying to update about us.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function delete($id)
    {
        try {
            $aboutus = AboutUs::findOrFail($id);

            $aboutus->delete();

            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully.'
            ], 200);
        }
        catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'About us not found.',
                'error' => 'Error: ' . $e->getMessage()
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
