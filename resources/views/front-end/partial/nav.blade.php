<nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top nav-bg border-bottom mt-lg-n5">
    <div class="container">
        <a class="navbar-brand text-white" href="/"><h2>DRB</h2></a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @php
                    $menus = App\Menu::whereNull('parent_menu_id')->orderBy('title')->get();
                @endphp
                @foreach($menus as $menu)
                    @php
                        $sub_menus = App\Menu::where('parent_menu_id', $menu->id)->orderBy('title')->get()
                    @endphp
                    @if(count($sub_menus)>0)
                    <li class="nav-item dropdown nav-custom-margin-top">
                        <a class="nav-link dropdown-toggle font-weight-bold text-white" href="{{ $menu->page ? $menu->page->slug : "#" }}"  id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$menu->title}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($sub_menus as $menu)
                                <a class="dropdown-item" href="{{ $menu->page ? $menu->page->slug : "#" }}">{{$menu->title}}</a>
                            @endforeach
                        </div>
                    </li>
                    @else
                        <li class="nav-item nav-custom-margin-top">
                            <a class="nav-link font-weight-bold text-white" href="{{ $menu->page ? $menu->page->slug : "#" }}" >
                                {{$menu->title}}
                            </a>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item dropdown nav-custom-margin-top">
                    <a class="nav-link dropdown-toggle font-weight-bold text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        COMPANY
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('finance-info-all')}}">Financial Statement</a>
                    </div>
                </li>
                <form class="form-inline my-2 my-lg-0">
                    @if(Auth::check())
                        @if(Auth::user()->type == 'admin')
                        <button class="btn btn-warning my-2 my-sm-0 mx-1" type="submit"><a href="/admin/menu">Admin Panel</a></button>
                        @endif
                        <button class="btn btn-warning my-2 my-sm-0 mx-1" type="submit"><a href="{{route('logout')}}"> Sign Out</a></button>
                    @else
                        <button class="btn btn-warning my-2 my-sm-0 mx-1" type="submit"><a href="{{route('register')}}"> Sign Up</a></button>
                        <button class="btn btn-outline-warning my-2 my-sm-0 text-white mx-1" type="submit"><a href="{{route('login')}}"> Sign In</a></button>
                    @endif
                </form>
            </ul>
        </div>
    </div>

    @if(App\Announcment::where('is_published', true)->first())
        <div class="alert alert-info announcement w-25" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Announcement! </strong>{{ App\Announcment::where('is_published', true)->first()->text }}
        </div>
    @endif
</nav>