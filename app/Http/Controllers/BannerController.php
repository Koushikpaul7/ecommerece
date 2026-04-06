<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::paginate(5);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 1. Define the folder path
        $path = 'images/banners/';

        // 2. Generate unique name
        $imageName = time() . '.' . $request->image->extension();

        // 3. Move the file
        $request->image->move(public_path($path), $imageName);

        // 4. Save the FULL PATH + NAME in the database
        Banner::create([
            'title' => $request->title,
            'image' => $path . $imageName, // This saves "images/banners/12345.jpg"
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner uploaded!');
    }
    public function toggleStatus(Banner $banner)
    {
        $banner->status = !$banner->status;
        $banner->save();
        return back()->with('success', 'Banner status updated successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $banner->title = $request->title;
        if ($request->hasFile('image')) {
            // 1. Define the folder path
            $path = 'images/banners/';

            // 2. Generate unique name
            $imageName = time() . '.' . $request->image->extension();

            // 3. Move the file
            $request->image->move(public_path($path), $imageName);

            // 4. Save the FULL PATH + NAME in the database
            $banner->image = $path . $imageName; // This saves "images/banners/12345.jpg"
        }
        $banner->save();
        return redirect()->route('admin.banners.index')->with('success', 'Banner updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('Warning', 'Banner deleted successfully.');
    }
}
