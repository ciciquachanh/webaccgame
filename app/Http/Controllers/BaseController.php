<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Accessories;


class BaseController extends Controller
{
    public function __construct()
    {
        // ✅ Share các biến toàn cục cho view
        View::share('category', Category::all());
        View::share('slider', Slider::all());
        View::share('Accessories', Accessories::orderBy('id', 'desc')->take(5)->get());
    }
}
