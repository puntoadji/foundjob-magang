<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){

        $categories = Category::where('status', 1)->get();
        $jobTypes = JobType::where('status', 1)->get();

        return view('front.jobs', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
        ]);
    }
}
