<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all(); // Fetch all images from the database
        return view('images.index', compact('images')); // Pass images to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
    
        if ($request->file('image')) {
            // Store image in the public disk
            $path = $request->file('image')->store('images', 'public'); 

            // Create a new record in the database
            Image::create([
                'filepath' => $path, // Store the relative path
            ]);
    
            return redirect()->back()->with('success', 'Image uploaded successfully!'); // Redirect with success message
        }
    
        return redirect()->back()->with('error', 'Image upload failed.'); // Redirect with error message
    }
}
