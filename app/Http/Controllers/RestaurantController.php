<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function create(){
        return view('restaurants.create');
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

        Restaurant::create($data);

        return redirect()->route('restaurant.index')->with('success', 'Restaurant created successfully!');
    }

    public function edit(Restaurant $restaurant){
        return view('restaurants.edit', ['restaurant' => $restaurant]);
    }

    public function update(Restaurant $restaurant, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'nullable|string',
            'price' => 'nullable|numeric',  
        ]);

        if ($request->hasFile('image')) {
            if ($restaurant->image) {
                \Storage::delete('public/' . $restaurant->image);
            }

            $imagePath = $request->file('image')->store('restaurants', 'public');
            $data['image'] = $imagePath;
        }

        $restaurant->update($data);

        return redirect(route('restaurant.index'))->with('success', 'Restaurant Updated Successfully');
    }


    public function destroy(Restaurant $restaurant){
        $restaurant->delete();
        return redirect(route('restaurant.index'))->with('success', 'Restaurant deleted Succesffully');
    }
    public function register_restaurant()
    {
        return view('restaurants.register');
    }
}
