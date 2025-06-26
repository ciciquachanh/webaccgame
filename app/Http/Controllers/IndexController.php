<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $slider = []; // Không lấy từ DB
        $category = [];
        return view('pages.home', compact('category', 'slider'));
    }

    public function dichvu()
    {
        return view('pages.services');
    }

    public function acc($slug)
    {
        $category = null;
        $nicks = [];
        return view('pages.acc', compact('slug', 'nicks', 'category'));
    }

    public function detail_acc($slug, $ms)
    {
        $category = null;
        $nick = null;
        return view('pages.accgame', compact('nick', 'category'));
    }

    public function danhmuc_game($slug)
    {
        $category = null;
        return view('pages.category', compact('category'));
    }

    public function danhmuccon($slug)
    {
        return view('pages.sub_category', compact('slug'));
    }

    public function detail_acc_simple($ms)
    {
        $nick = null;
        $category = null;
        return view('pages.accgame', compact('nick', 'category'));
    }
}
