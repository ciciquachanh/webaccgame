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
            <div class="card-header">Liệt kê nick game</div>

            <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{ route('nick.create') }}" class="btn btn-success mb-3">Thêm nick game</a>

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên nick</th>
                            <th>Thư viện ảnh</th>
                            <th>Mã số</th>
                            <th>Mô tả</th>
                            <th>Hiển thị</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                            <th>Thuộc tính</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nicks as $nick)
                        <tr>
                            <td>{{ $nick->id }}</td>
                            <td>{{ $nick->title }}</td>
<td>
<a href="{{ route('gallery.create', ['nick_id' => $nick->id]) }}" class="btn btn-success btn-sm">Thêm thư viện ảnh</a>

</td>

                            <td>#{{ $nick->ms }}</td>
                            <td>{{ $nick->description }}</td>
                            <td>
                                @if($nick->status == 0)
                                    <span class="badge badge-secondary">Không hiển thị</span>
                                @else
                                    <span class="badge badge-success">Hiển thị</span>
                                @endif
                            </td>
                            <td>
                                @if($nick->image)
                                    <img src="{{ asset('uploads/nick/' . $nick->image) }}" height="80px" style="object-fit:cover;">
                                @endif
                            </td>
                            <td>{{ $nick->category->title ?? 'Không có' }}</td>
                            <td>
                                @php
                                    $attributes = json_decode($nick->attribute, true);
                                @endphp
                                @if(is_array($attributes))
                                    @foreach($attributes as $attr)
                                        <span class="badge badge-dark">{{ $attr }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">Không có</span>
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('nick.edit', $nick->id) }}" class="btn btn-warning btn-sm mr-2">Sửa</a>
                                <form action="{{ route('nick.destroy', $nick->id) }}" method="POST" onsubmit="return confirm('Bạn muốn xoá nick game này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 

                <div class="d-flex justify-content-center mt-3">
                    {{ $nicks->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
