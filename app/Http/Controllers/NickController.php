<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Category;
use App\Models\Accessories;
class NickController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nicks = Nick::with('category')->orderBy('id','DESC')->paginate(20);
        return view('admin.nick.index',compact('nicks'));
          }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.nick.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    // Validate dữ liệu đầu vào
    $data = $request->validate([
        'title' => 'required|max:255',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'status' => 'required',
        'category_id' => 'required',
        'attribute' => 'array',
        'name_attribute' => 'array',
    ]);

    // Gộp tên phụ kiện + giá trị lại
    $attribute = [];
    if (!empty($data['attribute']) && !empty($data['name_attribute'])) {
        foreach ($data['attribute'] as $key => $value) {
            $name = $data['name_attribute'][$key] ?? null;
            if ($name) {
                $attribute[] = $name . ': ' . $value;
            }
        }
    }

    $nick = new Nick();
    $nick->title = $data['title'];
    $nick->ms = random_int(10000, 99999);
    $nick->description = $data['description'];
    $nick->price = $data['price'];
    $nick->category_id = $data['category_id'];
    $nick->status = $data['status'];

    // Nếu có cột attribute trong bảng nicks, lưu JSON phụ kiện vào
    $nick->attribute = json_encode($attribute, JSON_UNESCAPED_UNICODE);

    // Xử lý ảnh
    $get_image = $request->file('image');
    $path = 'uploads/nick/';
    $get_name_image = $get_image->getClientOriginalName();
    $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
    $get_image->move($path, $new_image);
    $nick->image = $new_image;

    $nick->save();

    return redirect()->route('nick.create')->with('status', 'Thêm nick game thành công');
}

 public function choose_category(Request $request){
    $data = $request->all();
    $access = Accessories::where('category_id', $data['category_id'])->where('status', 1)->get();
    $output = '';

    foreach ($access as $acce) {
        $output .= '
        <div class="form-group">
            <label for="exampleFormControlSelect1">' . $acce->title . '</label>
            <input type="hidden" value="' . $acce->title . '" name="name_attribute[]">
            <input type="text" class="form-control" required name="attribute[]" placeholder="...">
        </div>';
    }

    return response()->json($output);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $nick = Nick::find($id);
        return view('admin.nick.edit',compact('nick'));
            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $nick = Nick::findOrFail($id);

    $data = $request->validate([
        'title' => 'required|max:255',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'status' => 'required',
        'name_attribute' => 'array',
        'attribute' => 'array',
    ]);

    // Gộp thuộc tính (accessories)
    $attributes = [];
    if (!empty($data['name_attribute']) && !empty($data['attribute'])) {
        foreach ($data['name_attribute'] as $key => $name) {
            $value = $data['attribute'][$key] ?? '';
            $attributes[] = $name . ': ' . $value;
        }
    }

    $nick->title = $data['title'];
    $nick->price = $data['price'];
    $nick->description = $data['description'];
    $nick->status = $data['status'];
    $nick->attribute = json_encode($attributes, JSON_UNESCAPED_UNICODE);

    // Cập nhật ảnh nếu có
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $newImageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/nick'), $newImageName);

        // Xoá ảnh cũ nếu có
        if ($nick->image && file_exists(public_path('uploads/nick/' . $nick->image))) {
            unlink(public_path('uploads/nick/' . $nick->image));
        }

        $nick->image = $newImageName;
    }

    $nick->save();

    return redirect()->route('nick.index')->with('status', 'Cập nhật nick thành công!');
}

}
