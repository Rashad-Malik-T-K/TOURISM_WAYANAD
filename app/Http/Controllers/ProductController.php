<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Resorts;

class ProductController extends Controller
{
    // public function index(){
    //     $products = Product::all();
    //     return view('products.index', ['products' => $products]);
        
    // }

    public function index()
    {
        $user = auth()->user();

        // Check user level
        if ($user->level == 1) {
            // Admin users see all products
            $products = Product::all();
        } else {
            // Regular users see only the products they created
            $products = Product::where('user_id', $user->id)->get();
        }

        return view('products.index', compact('products'));
    }

    public function showWelcome()
    {
        $products = Product::all(); // Fetch all products
        $restaurants = Restaurant::all(); // Fetch all restaurants
        $resorts = Resorts::all();
        // $restaurants = Restaurant::find(1);

        // Pass both variables to the view
        return view('index', compact('products', 'restaurants', 'resorts'));
    }


    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'price' => 'required|numeric|between:0,999999.99',
            'description' => 'nullable|string|max:1000',
        ]);

        // Attach the logged-in user's ID to the product
        $data['user_id'] = auth()->id();
        $data['level'] = auth()->user()->level;

        // Create a new product
        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }


    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $data = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'qty' => 'required|numeric',
    //         'price' => 'required|numeric|between:0,999999.99',
    //         'description' => 'nullable|string|max:1000',
    //     ]);

    //     // Create a new product record in the database
    //     Product::create($data);

    //     // Redirect to a success page (or back to the form)
    //     return redirect()->route('product.index')->with('success', 'Form submitted successfully!');
    // }
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Succesffully');

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted Succesffully');
    }
    public function updateStatus(Request $request, Product $product)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|integer|in:0,1,2', // Ensure the status is one of the allowed values
        ]);

        // Update the product's status
        $product->status = $request->status;
        $product->save();

        // Redirect back with a success message
        return redirect()->route('product.index')->with('success', 'Product status updated successfully!');
    }

}
