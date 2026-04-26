<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('order')->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'product_category_id' => 'nullable|exists:product_categories,id',
            'short_description'   => 'nullable|string|max:500',
            'description'         => 'nullable|string',
            'price'               => 'nullable|numeric|min:0',
            'sale_price'          => 'nullable|numeric|min:0',
            'unit'                => 'nullable|string|max:50',
            'sku'                 => 'nullable|string|max:100',
            'stock'               => 'nullable|integer|min:0',
            'video'               => 'nullable|string|max:500',
            'video_file'          => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200',
            'in_stock'            => 'nullable|boolean',
            'featured'            => 'nullable|boolean',
            'active'              => 'nullable|boolean',
            'order'               => 'nullable|integer',
            'images.*'            => 'nullable|image|max:4096',
        ]);

        $data['order']    = $data['order'] ?? 0;
        $data['slug']     = Str::slug($data['name']);
        $data['in_stock'] = $request->boolean('in_stock');
        $data['featured'] = $request->boolean('featured');
        $data['active']   = $request->boolean('active');

        // Handle multiple image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }
        $data['images'] = !empty($imagePaths) ? $imagePaths : null;

        if ($request->hasFile('video_file')) {
            $data['video_file'] = $request->file('video_file')->store('product_videos', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'product_category_id' => 'nullable|exists:product_categories,id',
            'short_description'   => 'nullable|string|max:500',
            'description'         => 'nullable|string',
            'price'               => 'nullable|numeric|min:0',
            'sale_price'          => 'nullable|numeric|min:0',
            'unit'                => 'nullable|string|max:50',
            'sku'                 => 'nullable|string|max:100',
            'stock'               => 'nullable|integer|min:0',
            'video'               => 'nullable|string|max:500',
            'video_file'          => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200',
            'remove_video_file'   => 'nullable|boolean',
            'in_stock'            => 'nullable|boolean',
            'featured'            => 'nullable|boolean',
            'active'              => 'nullable|boolean',
            'order'               => 'nullable|integer',
            'images.*'            => 'nullable|image|max:4096',
        ]);

        $data['order']    = $data['order'] ?? 0;
        $data['slug']     = Str::slug($data['name']);
        $data['in_stock'] = $request->boolean('in_stock');
        $data['featured'] = $request->boolean('featured');
        $data['active']   = $request->boolean('active');

        // Keep existing images, add new ones
        $existingImages = $product->images ?? [];

        // Handle deletions
        $deleteImages = $request->input('delete_images', []);
        if (!empty($deleteImages)) {
            foreach ($deleteImages as $path) {
                Storage::disk('public')->delete($path);
                $existingImages = array_values(array_filter($existingImages, fn($img) => $img !== $path));
            }
        }

        // Add new uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $existingImages[] = $image->store('products', 'public');
            }
        }

        $data['images'] = !empty($existingImages) ? array_values($existingImages) : null;

        // Handle Video File Upload
        if ($request->hasFile('video_file')) {
            if ($product->video_file) {
                Storage::disk('public')->delete($product->video_file);
            }
            $data['video_file'] = $request->file('video_file')->store('product_videos', 'public');
        } elseif ($request->boolean('remove_video_file')) {
            if ($product->video_file) {
                Storage::disk('public')->delete($product->video_file);
            }
            $data['video_file'] = null;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->images) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        if ($product->video_file) {
            Storage::disk('public')->delete($product->video_file);
        }
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted.');
    }
}
