@php
    $menus = App\Models\Menu::roots()->active()->ordered()->with('children')->get();
@endphp

@if ($menus->count() > 0)
    <nav class="navbar navbar-expand-lg navbar-dark p-0">
        {{-- <div class="logo logo-area">
            <a class="d-block" href="{{ url('/') }}">
                <img loading="lazy" src="{{ asset('assets/img/logo.png') }}" alt="Constra">
            </a>
        </div> --}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse"
            aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto align-items-center">
                <li class="nav-item dropdown {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>

                @foreach ($menus as $menu)
                    @if ($menu->hasChildren() && $menu->is_active)
                        <li class="nav-item dropdown {{ request()->is($menu->name) ? 'active' : '' }}">
                            <a href="#" class="nav-link dropdown-toggle"
                                data-toggle="dropdown">{{ $menu->name }} <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach ($menu->children as $child)
                                    <li><a href="{{ $child->full_url }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @elseif($menu->is_active)
                        <li class="nav-item {{ request()->is($menu->name) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ $menu->full_url }}">{{ $menu->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
@endif
