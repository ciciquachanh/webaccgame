@extends('layouts.app')
@section('navbar')
    <div class="container">
  @include('admin.include.navbar')
    </div>
@endsection
@section('content')
   <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Thêm slider') }}</div>

                                       @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('slider.index')}}" class="btn btn-success mb-3">Liệt kê slider</a>
                     <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" required name="title" placeholder="...">

  </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Image</label>
        <input type="file" class="form-control-file" name="image">

    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea class="form-control" name="description" placeholder="..."></textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Status</label>
      <select class="form-control" name="status">
            <option value="1" >Hiển thị</option>
            <option value="0">Không hiển thị</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
        
                </div>
            </div>
        </div>
    </div>
 
@endsection