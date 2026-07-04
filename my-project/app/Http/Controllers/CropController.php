<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CropController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(Request $request)
    {
        $data = Crop::get();

        return view('admin.crop.index', compact('data'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $parentCategories = Category::where('status', 1)
            ->whereNotNull('parent_id')
            ->orderBy('name')
            ->get();
        return view('admin.crop.cropcreate', compact('parentCategories'));
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'nullable|string',
            'categories_id' => 'nullable',
            'status' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['created_at'] = now();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('crop', $filename, 'public');
            $data['image'] = $path;
        }

        $category = Crop::create($data);

        return redirect('/admin/crop')
            ->with('success', 'crop created successfully!');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        $crop = Crop::findOrFail($id);

        $parentCategories = Category::where('status', 1)
            ->whereNotNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.crop.edit', compact('crop', 'parentCategories'));
    }

    /**
     * Update the specified category.
     */
    public function update(Request $request, $id)
    {
        $crop = Crop::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'categories_id' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $crop->title = $request->title;
        $crop->slug = Str::slug($request->title);
        $crop->content = $request->content;
        $crop->categories_id = $request->categories_id;
        $crop->status = $request->status;

        if ($request->hasFile('image')) {

            if ($crop->image && Storage::disk('public')->exists($crop->image)) {
                Storage::disk('public')->delete($crop->image);
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();

            $crop->image = $image->storeAs('crop', $filename, 'public');
        }

        $crop->save();

        return redirect('/admin/crop')->with('success', 'Crop updated successfully.');
    }
    /**
     * Remove the specified category.
     */
    public function destroy($id)
    {
        $crop = Crop::findOrFail($id);

        if ($crop->image && Storage::disk('public')->exists($crop->image)) {
            Storage::disk('public')->delete($crop->image);
        }

        $crop->delete();

        return redirect('/admin/crop')->with('success', 'Crop deleted successfully.');
    }

    /**
     * Update category status.
     */
    public function updateStatus(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:active,inactive,pending',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid status'], 422);
        }

        $category->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!',
            'status' => $category->status
        ]);
    }

    public function toggleHome($id)
    {
        $crop = Crop::findOrFail($id);

        $crop->is_home = $crop->is_home == 1 ? 0 : 1;
        $crop->save();

        return redirect()->back()->with('success', 'Home status updated successfully.');
    }
}