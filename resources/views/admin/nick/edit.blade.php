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
            <div class="card-header">{{ __('Cập nhật nick game') }}</div>

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

                <a href="{{ route('nick.index') }}" class="btn btn-success mb-3">Liệt kê nick game</a>
                <a href="{{ route('nick.create') }}" class="btn btn-success mb-3">Thêm nick game</a>

                <form action="{{ route('nick.update', [$nick->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Tên nick</label>
                        <input type="text" class="form-control" name="title" value="{{ $nick->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="text" class="form-control" name="price" value="{{ $nick->price }}" required>
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh hiện tại</label><br>
                        <img src="{{ asset('uploads/nick/' . $nick->image) }}" width="150px" height="150px" alt="Image">
                    </div>

                    <div class="form-group">
                        <label for="image">Cập nhật hình ảnh mới</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3">{{ $nick->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status">
                            <option value="1" {{ $nick->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ $nick->status == 0 ? 'selected' : '' }}>Không hiển thị</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Thuộc tính nick</label>
                        @php
                            $attributes = json_decode($nick->attribute, true);
                        @endphp
                        @if(is_array($attributes))
                            @foreach($attributes as $attr)
                                @php
                                    $parts = explode(':', $attr, 2);
                                    $name = trim($parts[0]);
                                    $value = trim($parts[1] ?? '');
                                @endphp
                                <div class="row mb-2">
                                    <div class="col-md-5">
                                        <input type="text" name="name_attribute[]" class="form-control" value="{{ $name }}" placeholder="Tên thuộc tính">
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="attribute[]" class="form-control" value="{{ $value }}" placeholder="Giá trị">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <input type="text" name="name_attribute[]" class="form-control" placeholder="Tên thuộc tính">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="attribute[]" class="form-control" placeholder="Giá trị">
                                </div>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
