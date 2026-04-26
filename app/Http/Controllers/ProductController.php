<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $settings   = Setting::all()->pluck('value', 'key');
        $categories = ProductCategory::orderBy('order')->orderBy('name')->withCount('products')->get();

        $query = Product::where('active', true)->with('category')->orderBy('order')->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('short_description', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('sort')) {
            match ($request->sort) {
                'price_asc'  => $query->orderBy('price'),
                'price_desc' => $query->orderByDesc('price'),
                'newest'     => $query->latest(),
                default      => null,
            };
        }

        $products = $query->paginate(12)->withQueryString();

        return view('products.index', compact('products', 'categories', 'settings'));
    }

    public function show(Product $product)
    {
        abort_unless($product->active, 404);
        $settings    = Setting::all()->pluck('value', 'key');
        $related = Product::where('active', true)
            ->where('id', '!=', $product->id)
            ->where('product_category_id', $product->product_category_id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'related', 'settings'));
    }
}
