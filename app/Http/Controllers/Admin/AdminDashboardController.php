<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $blogCount = Blog::count();
        $inquiryCount = Inquiry::count();
        $readInquiryCount = Inquiry::where('read', true)->count();
        $recentInquiries = Inquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'projectCount', 
            'blogCount', 
            'inquiryCount', 
            'readInquiryCount',
            'recentInquiries'
        ));
    }
}
