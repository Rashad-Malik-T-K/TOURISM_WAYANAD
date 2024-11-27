<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resorts;

class ResortsController extends Controller
{
    //
    public function index()
    {
        $resorts = Resorts::all();
        return view('resorts.index', compact('resorts'));
    }

    public function create(){
        return view('resorts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|string',
            'price' => 'nullable|numeric',  
        ]);    
        
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images', 'public');
            $data['image'] = $filePath; 
        }

        $data['user_id'] = auth()->id();

        Resorts::create($data);

        return redirect()->route('resorts.index')->with('success', 'resorts created successfully!');
    }

    public function edit(Resorts $resorts){
        return view('resorts.edit', ['resorts' => $resorts]);
    }

    public function update(Resorts $resorts, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|string',
            'price' => 'nullable|numeric',  
        ]);

        if ($request->hasFile('image')) {
            if ($resorts->image) {
                \Storage::delete('public/' . $resorts->image);
            }

            $imagePath = $request->file('image')->store('resortss', 'public');
            $data['image'] = $imagePath;
        }

        $resorts->update($data);

        return redirect(route('resorts.index'))->with('success', 'resorts Updated Successfully');
    }


    public function destroy(Resorts $resorts){
        $resorts->delete();
        return redirect(route('resorts.index'))->with('success', 'resorts deleted Succesffully');
    }
    public function register_resort()
    {
        return view('resorts.register');
    }
}
