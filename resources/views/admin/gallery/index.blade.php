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
                <div class="card-header">{{ __('Thêm gallery gallery game') }}</div>

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

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="nick_id" value="{{Request::segment(2)}}">   
    @csrf
   
    <div class="form-group">
        <label for="exampleInputEmail1">Chọn Image</label>
        <input type="file" class="form-control-file" required multiple name="image{]">

    </div>

    

    <button type="submit" class="btn btn-primary">Thêm ảnh</button>
</form>
                </div>
            </div>
        </div>
    </div>
 
@endsection