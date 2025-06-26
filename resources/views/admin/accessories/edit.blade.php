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
            <div class="card-header">{{ __('Cập nhật phụ kiện game') }}</div>

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

                <a href="{{ route('accessories.index') }}" class="btn btn-success mb-3">Liệt kê phụ kiện game</a>

                <form action="{{ route('accessories.update', $accessories->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- dùng PUT cho update --}}
                    
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" value="{{ $accessories->title }}" class="form-control" name="title" placeholder="...">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                         <select class="form-control" required name="status">
    @if($accessories->status == 1)
        <option value="1" selected>Hiển thị</option>
        <option value="0">Không hiển thị</option>
    @else
        <option value="1">Hiển thị</option>
        <option value="0" selected>Không hiển thị</option>
    @endif
</select>

                    </div>

                    <div class="form-group">
                        <label>Thuộc game</label>
                        <select class="form-control" name="category_id">
                            @foreach($category as $cate)
                                <option value="{{ $cate->id }}" {{ $accessories->category_id == $cate->id ? 'selected' : '' }}>
                                    {{ $cate->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật phụ kiện</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
