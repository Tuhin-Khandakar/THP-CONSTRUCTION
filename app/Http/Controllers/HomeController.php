<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Blog;
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
        $team = \App\Models\TeamMember::orderBy('order')->get();
        $settings = \App\Models\Setting::all()->pluck('value', 'key');
        return view('about', compact('team', 'settings'));
    }

    public function sitemap()
    {
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . trim(view('sitemap')->render());
        return Response::make($content, 200, ['Content-Type' => 'text/xml']);
    }

    public function robots()
    {
        return response("User-agent: *\nAllow: /\nSitemap: " . url('/sitemap.xml'), 200)
            ->header('Content-Type', 'text/plain');
    }
}
