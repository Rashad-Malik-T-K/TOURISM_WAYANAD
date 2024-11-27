<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;

class BookingsController extends Controller
{
    //
    public function index()
    {
        $bookings = Bookings::all();
        return view('bookings.index', compact('bookings'));
    }
    public function create(){
        return view('bookings.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|string',
            'destination' => 'required|string|max:255',
            'persons' => 'required|string|max:255',
            'categories' => 'required|string|max:255',
            'request' => 'required|string|max:1000',
        ]);

        // Store data in the database
        Bookings::create($validated);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Booking created successfully!');
    }
    public function edit(Bookings $bookings){
        return view('bookings.edit', ['bookings' => $bookings]);
    }
    public function update(Bookings $bookings, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'destination' => 'required|string|max:255',
            'persons' => 'required|integer|min:1',
            'categories' => 'required|string|max:255',
            'request' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('image')) {
            if ($bookings->image) {
                \Storage::delete('public/' . $bookings->image);
            }

            $imagePath = $request->file('image')->store('restaurants', 'public');
            $data['image'] = $imagePath;
        }

        $bookings->update($data);

        return redirect(route('bookings.index'))->with('success', 'bookings Updated Successfully');
    }


    public function destroy(Bookings $bookings){
        $bookings->delete();
        return redirect(route('bookings.index'))->with('success', 'bookings deleted Succesffully');
    }

}
