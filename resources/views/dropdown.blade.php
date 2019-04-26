@extends('nav')

@section('content')
<section>

<div class="dropdown open">
    <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
        Dropdown
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-submenu">
            <a class="dropdown-item">一级菜单</a>
            <div class="dropdown-menu" >
                <a class="dropdown-item" href="#">Action</a>
                <div class="dropdown-submenu">
                    <a class="dropdown-item">2单</a>
                    <div class="dropdown-menu" >
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Action</a>
                    </div>
                </div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Action</a>
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Action</a>
    </div>
</div>

</section>


@endsection