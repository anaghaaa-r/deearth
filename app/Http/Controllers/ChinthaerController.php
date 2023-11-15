<?php

namespace App\Http\Controllers;

use App\Models\Chinthaer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChinthaerController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|string',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }

        $originalFilename = $request->file('image')->getClientOriginalName();
        $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = 'uploads/archives/chinthaer/' . $filename;
        $request->file('image')->storeAs('public/' . $imagePath);

        try {
            $order = $request->input('order');
            $orderParts = preg_split('/(?<=\d)(?=[A-Za-z])/', $order, 2);
            $orderValue = $orderParts[0] ?? '';
            $orderSuffix = $orderParts[1] ?? '';

            $chinthaer = new Chinthaer();
            $chinthaer->order = $orderValue;
            $chinthaer->order_suffix = $orderSuffix;
            $chinthaer->name = $request->input('name');
            $chinthaer->description = $request->input('description');
            $chinthaer->image = $imagePath;

            $chinthaer->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully added to chinthaer.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding to chinthaer.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $chinthaer = Chinthaer::find($id);

        if(!$chinthaer)
        {
            return response()->json([
                'status' => false,
                'message' => 'Chinthaer not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'order' => 'nullable|string',
            'name' => 'nullable|string',
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
            $imagePath = 'uploads/archives/chinthaer/' . $filename;
            $request->file('image')->storeAs('public/' . $imagePath);
            $updatedData['image'] = $imagePath;
        }

        if(empty($updatedData))
        {
            return response()->json([
                'status' => true,
                'message' => 'Nothing to Update.'
            ], 200);
        }

        try {
            $chinthaer->update($updatedData);

            return response()->json([
                'status' => true,
                'message' => 'Chinthaer updated successfully.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error trying to update chinthaer.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function delete($id)
    {
        try {
            $chinthaer = Chinthaer::findOrFail($id);

            $chinthaer->delete();

            return response()->json([
                'status' => true,
                'message' => 'Chinthaer deleted successfully.'
            ], 200);
        }
        catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Chinthaer not found.',
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
