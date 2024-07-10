<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coffee;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::all();
        return response()->json($coffees, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads'), $imageName);

        $coffee = Coffee::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return response()->json(['message' => 'Coffee created successfully.', 'data' => $coffee], 201);
    }

    public function show(Coffee $coffee)
    {
       
        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found.'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($coffee, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
     
        $coffee = Coffee::find($id);

     
        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found.'], Response::HTTP_NOT_FOUND);
        }

     
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

      
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
           
            if ($coffee->image) {
                Storage::disk('public')->delete($coffee->image);
            }

            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            $data['image'] = $path;
        }

      
        $coffee->update($data);

        
        return response()->json(['message' => 'Coffee updated successfully.', 'data' => $coffee], Response::HTTP_OK);
    }

    public function destroy(Coffee $coffee)
    {
      
        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found.'], Response::HTTP_NOT_FOUND);
        }

      
        if ($coffee->image) {
            Storage::disk('public')->delete($coffee->image);
        }

        $coffee->delete();

        
        return response()->json(['message' => 'Coffee successfully deleted.'], Response::HTTP_OK);
    }
}
