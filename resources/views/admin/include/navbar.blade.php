<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/home')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('slider.index')}}">Slider</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" target="_blank" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category.index')}}">Danh mục game</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{route('accessories.index')}}">Phụ kiện</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('nick.index')}}">Nick game</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="#">Dịch vụ game</a>
            </li>
        </ul>
    </div>

</nav>
