<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|string',
            'name' => 'required|string',
            'designation' => 'required|string',
            'profile' => 'required|image|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422);
        }

        $originalFilename = $request->file('profile')->getClientOriginalName();
        $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('profile')->getClientOriginalExtension();
        $imagePath = 'uploads/office/profiles/' . $filename;
        $request->file('profile')->storeAs('public/' . $imagePath);

        try {
            $order = $request->input('order');
            $orderParts = preg_split('/(?<=\d)(?=[A-Za-z])/', $order, 2);
            $orderValue = $orderParts[0] ?? '';
            $orderSuffix = $orderParts[1] ?? '';

            $people = new People();
            $people->order = $orderValue;
            $people->order_suffix = $orderSuffix;
            $people->name = $request->input('name');
            $people->designation = $request->input('designation');
            $people->profile = $imagePath;

            $people->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfully added.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error adding.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $people = People::find($id);

        if(!$people)
        {
            return response()->json([
                'status' => false,
                'message' => 'Not found.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'order' => 'nullable|string',
            'name' => 'nullable|string',
            'designation' => 'nullable|string',
            'profile' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'error' => 'Error: ' . $validator->errors()
            ], 422  );
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

        if($request->filled('designation'))
        {
            $updatedData['designation'] = $request->input('designation');
        }

        if($request->hasFile('profile'))
        {
            $originalFilename = $request->file('profile')->getClientOriginalName();
            $originalFilenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);
            $filename = str_replace(' ', '-', $originalFilenameWithoutExtension) . '--' . time() . '.' . $request->file('profile')->getClientOriginalExtension();
            $imagePath = 'uploads/office/profiles/' . $filename;
            $request->file('profile')->storeAs('public/' . $imagePath);
            $updatedData['profile'] = $imagePath;
        }

        if(empty($updatedData))
        {
            return response()->json([
                'status' => true,
                'message' => 'Nothing to update.'
            ], 200);
        }

        try {
            $people->update($updatedData);

            return response()->json([
                'status' => true,
                'message' => 'Updated Successfully.'
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error trying to update.',
                'error' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }

    public function delete($id)
    {
        try {
            $people = People::findOrFail($id);

            $people->delete();

            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully.'
            ], 200);
        }
        catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Not found.',
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
