<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Product;
use App\Models\TeamMember;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->take(6)->get();
        $featuredProjects = Project::latest()->take(4)->get();
        $latestBlogs = Blog::latest()->take(3)->get();
        $testimonials = Testimonial::where('active', true)->latest()->get();

        return view('home', compact('services', 'featuredProjects', 'latestBlogs', 'testimonials'));
    }

    public function about()
    {
        $team = TeamMember::where('type', 'team')->orderBy('order')->get();
        $trustees = TeamMember::where('type', 'trustee')->orderBy('order')->get();
        $settings = Setting::all()->pluck('value', 'key');
        return view('about', compact('team', 'trustees', 'settings'));
    }

    public function sitemap()
    {
        $projects = Project::latest()->get();
        $blogs = Blog::latest()->get();
        $products = Product::where('active', true)->latest()->get();
        
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . view('sitemap', compact('projects', 'blogs', 'products'))->render();
        
        return response($content)
            ->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        return response("User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml'), 200)
            ->header('Content-Type', 'text/plain');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }
}
