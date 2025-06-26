namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $slider = []; // Tạm không lấy DB
        $category = [];
        return view('pages.home', compact('category','slider'));
    }

    public function dichvu(){
        return view('pages.services');
    }

    public function acc($slug){
        // Tạm bỏ xử lý DB
        $category = null;
        $nicks = [];
        return view('pages.acc', compact('slug','nicks','category'));
    }

    public function detail_acc($slug, $ms)
    {
        $category = null;
        $
