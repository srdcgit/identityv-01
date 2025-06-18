{{-- <div class="sidebar">
    <div class="sidebar__inner">
        <div class="sidebar-top-inner">
            <div class="sidebar__logo">
                <a href="{{ route('home') }}" class="sidebar__main-logo">
                    <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png', '?' . time()) }}"
                        alt="{{ config('app.name') }}">
                </a>
                <div class="navbar__left">
                    <button class="navbar__expand">
                        <i class="fas fa-bars-staggered"></i>
                    </button>
                    <button class="sidebar-mobile-menu">
                        <i class="fas fa-bars-staggered"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar__menu-wrapper">
                <ul class="sidebar__menu p-0">
                    <li class="sidebar-menu-item {{ Route::is('user.home') ? 'active' : '' }}">
                        <a href="{{ route('user.home') }}">
                            <i class="menu-icon las la-tachometer-alt"></i>
                            <span class="menu-title">@lang('Dashboard')</span>
                        </a>
                    </li>
                    @foreach (App\Models\Module::orderBy('position', 'asc')->get() as $module)
                        <li class="sidebar-menu-item {{ Request::is($module->route) ? 'active' : '' }}">
                            <a href="{{ url('user/' . $module->url) }}">
                                <span class="menu-title">@lang($module->title)</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div> --}}
