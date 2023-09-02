<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
use App\Models\CommercialGallery;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommercialGalleryController extends Controller
{
    public function addImage(Request $request, $id)
    {
        $commercial = Commercial::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'images.*' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation error.',
                'error' => 'Error: ' . $validator->errors()
            ], 400);
        }

        try {
            $uploadedImages = [];

            if($request->hasFile('images'))
            {
                foreach ($request->file('images') as $image)
                {
                    $originalFilename = $image->getClientOriginalName();
                    $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
                    $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $image->getClientOriginalExtension();
                    $imagePath = 'uploads/works/commercial/' . $filename;
                    $image->storeAs('public/' . $imagePath);

                    $uploadedImages[] = $imagePath;
                }
            }
            
            if(!empty($uploadedImages))
            {
                $imageData = [];

                foreach ($uploadedImages as $image)
                {
                    $imageData[] = ['image' => $image];
                }

                $commercial->gallery()->createMany($imageData);

                return response()->json([
                    'status' => true,
                    'message' => 'added to image gallery.'
                ], 200);
            }
            else
            {
                return response()->json([
                    'status' => 'false',
                    'message' => 'No image was uploaded.'
                ], 400);
            }
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'error adding image to gallery.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        } 
    }

    public function deleteImage($id)
    {
        try {
            $image = CommercialGallery::findOrFail($id);

            $image->delete();
            
            return response()->json([
                'status' => true,
                'message' => 'Deleted image successfully.'
            ], 200);
        }
        catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Image not found.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
