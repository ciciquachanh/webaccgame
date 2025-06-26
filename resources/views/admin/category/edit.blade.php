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
      <div class="card-header">{{ __('Cập nhật danh mục game') }}</div>

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

        <a href="{{ route('category.index') }}" class="btn btn-success mb-3">Liệt kê danh mục game</a>
        <a href="{{ route('category.create') }}" class="btn btn-success mb-3">Thêm danh mục game</a>

        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">   
          @csrf
          @method('PUT') {{-- Bắt buộc khi update --}}
                          
                      <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" required onchange="ChangeToSlug();" id="slug" value="{{ $category->title }}" name="title" placeholder="...">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" required value="{{$category->slug}}" id="convert_slug" name="slug" placeholder="...">
                </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control-file" name="image">
            <img src="{{ asset('uploads/category/' . $category->image) }}" height="150px" width="150px">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" required placeholder="...">{{ $category->description }}</textarea>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class required="form-control" required name="status">
              <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Hiển thị</option>
              <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Không hiển thị</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
