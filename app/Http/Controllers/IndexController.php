<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Nick;


class IndexController extends Controller
{
    public function home(){
          $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
          $category = Category::orderBy('id','DESC')->get();
        return view('pages.home',compact('category','slider'));
    }
      public function dichvu(){
        return view('pages.services');
    }
      public function acc($slug){
        $category = Category::where('slug',$slug)->first();
        $nicks = Nick::where('category_id',$category->id)->where('status',1)->paginate(10);
        return view('pages.acc', compact('slug','nicks','category'));
    }
  public function detail_acc($slug, $ms)
{
    $category = Category::where('slug', $slug)->firstOrFail();
    $nick = Nick::where('ms', $ms)
                ->where('category_id', $category->id)
                ->firstOrFail();

    return view('pages.accgame', compact('nick', 'category'));
}
  public function danhmuc_game($slug){
    $category = Category::where('slug', $slug)->firstOrFail();
    return view('pages.category', compact('category'));
}

      public function danhmuccon($slug){
        return view('pages.sub_category',compact('slug'));
    }
    public function detail_acc_simple($ms)
{
    $nick = Nick::where('ms', $ms)->firstOrFail();
    $category = Category::find($nick->category_id);

    return view('pages.accgame', compact('nick', 'category'));
}

}