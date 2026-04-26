<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::orderBy('order');

        if ($request->has('category') && $request->category != 'All') {
            $query->where('category', $request->category);
        }

        $items = $query->get();
        $categories = Gallery::whereNotNull('category')->distinct()->pluck('category');

        return view('gallery', compact('items', 'categories'));
    }
}
