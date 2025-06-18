@php
    $languages = App\Models\Language::all();
    $user = auth()->user();
@endphp
<style>
    /* Button Styling */
    .glowing-btn {
        position: relative;
        background: linear-gradient(90deg, #ffd700, #f9a602);
        /* Yellow gradient */
        color: #000;
        /* Black text for contrast */
        font-weight: bold;
        padding: 12px 30px;
        text-align: center;
        text-transform: uppercase;
        border: none;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    /* Glow Effect */
    .glowing-btn::before {
        content: "";
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(90deg, #fffacd, #ffeb3b, #ffdd00);
        /* Light to vibrant yellow gradient */
        z-index: -1;
        filter: blur(4px);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    /* Hover Effects */
    .glowing-btn:hover {
        transform: scale(1.1);
    }

    .glowing-btn:hover::before {
        opacity: 1;
    }

    /* Active State */
    .glowing-btn:active {
        transform: scale(0.95);
    }

    /* code by sumit */

    /* responsive code */

    @media only screen and (max-width:768px) {
        .navbar-wrapper-area {
            justify-content: space-between !important;
            padding-right: 30px !important;
            position: relative;
        }


        .navbar__right {
            position: absolute;
            top: 100%;
            left: 0px !important;
            background: rgb(218, 216, 216);
            width: 100%;
            padding-bottom: 10px;
            border:1px dashed brown;
            display:none;
        }

        ul.navbar__action-list {
            flex-direction: column;
            width: 100%;
            align-items:start;
        }

        ul.navbar__action-list li {
            /* border-top:2px solid brown; */
            width: 100%;
            border-bottom: 1px solid brown;
        }

        ul.navbar__action-list li:hover {
            background: brown;
        }

        ul.navbar__action-list li:hover a p {
            color: white !important;
        }


        ul.navbar__action-list li:nth-last-child(2)>button {
            width: 100% !important;
        }

        ul.navbar__action-list li:nth-last-child(1){
            width:fit-content !important;
            margin-left:10px;
            margin-top:10px;
        }

        .navbar-user__info,
        .navbar-user .icon {
            display: block !important;
        }

        .navbar-user .icon {
            margin-left: auto !important;
            margin-top:-8px !important;
        }

         ul.navbar__action-list li:nth-last-child(2):hover :where(.navbar-user__info span,.icon){
            color:white !important;
         }


         ul.navbar__action-list li:nth-last-child(2)> .dropdown-menu {
            position: relative !important;
            left: -20px !important;
        top: -41px !important;
        width: 90vw !important;
         }

    }

    /* navbar */
</style>
<nav class="navbar-wrapper">
    <div class="navbar-wrapper-area" style="justify-content: unset;">
        <div class="col-md-2">
            <a href="{{ route('home') }}" class="sidebar__main-logo" style="margin-left: 40px;">
                <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png', '?' . time()) }}"
                    alt="{{ config('app.name') }}" style="width: 120px;">
            </a>
        </div>

        <div class="col-md-1 d-block d-md-none">
            <i class="fa-solid fa-bars bar-close-btn"></i>
            {{-- <i class="fa-solid fa-xmark"></i> --}}
        </div>

        <div class="navbar__right col-md-10">
            <ul class="navbar__action-list">
                <li class="sidebar-menu-item ">
                    <a href="{{ route('user.home') }}">
                        <p class="menu-title">@lang('My Dashboard')</p>
                    </a>
                </li>
                @foreach (App\Models\Module::orderBy('position', 'asc')->take(4)->get() as $module)
                    <li class="sidebar-menu-item {{ Request::is($module->route) ? 'active' : '' }}">
                        <a href="{{ url('user/' . $module->url) }}">
                            <p class="menu-title">@lang($module->title)</p>
                        </a>
                    </li>
                @endforeach

                <li class="sidebar-menu-item dropdown">
                    <button type="button" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="navbar-user">
                            <span class="navbar-user__thumb"> <img
                                    src="{{ getImage(getFilePath('userProfile') . '/' . @$user->image, getFileSize('userProfile')) }}"
                                    alt="@lang('user profile')"></span>
                            <span class="navbar-user__info">
                                <span class="navbar-user__name">{{ $user->username }}</span>
                            </span>
                            <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--sm p-0 border-0  dropdown-menu-right">
                        <a href="{{ route('user.profile.setting') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-user-circle"></i>
                            <span class="dropdown-menu__caption">@lang('Profile')</span>
                        </a>
                        <a href="{{ route('user.change.password') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-key"></i>
                            <span class="dropdown-menu__caption">@lang('Password')</span>
                        </a>
                        <a href="{{ route('user.twofactor') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-user-check"></i>
                            <span class="dropdown-menu__caption">@lang('2F Security')</span>
                        </a>
                        <a href="{{ route('user.logout') }}"
                            class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                            <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                            <span class="dropdown-menu__caption">@lang('Logout')</span>
                        </a>
                    </div>
                </li>
                {{-- <li class="sidebar-menu-item btn btn-warning ">
                    <a href="{{ route('user.upgradeplanupgrade') }}">
                        <span class="menu-title">@lang('Upgrade')</span>
                    </a>
                </li> --}}
                <li
                    class="sidebar-menu-item {{ Auth::check() && Auth::user()->is_upgrade ? 'btn btn-warning glowing-btn' : 'btn btn-warning' }}">
                    @if (Auth::check() && Auth::user()->is_upgrade)
                        <a href="{{ route('user.upgradeplanupgrade') }}">
                            <span class="menu-title">{{ Auth::user()->getUpgrade->plan_name }}</span>
                        </a>
                    @else
                        <a href="{{ route('user.upgradeplanupgrade') }}">
                            <span class="menu-title">@lang('Upgrade')</span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>



    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

$(document).ready(function() {

    

    $(".bar-close-btn").click(function(){

        if($(this).hasClass("fa-bars")){
            $(this).removeClass("fa-bars").addClass("fa-times");
            $(".navbar__right").slideDown("fast");
        }else{
            $(this).removeClass("fa-times").addClass("fa-bars");
             $(".navbar__right").slideUp("fast");
        }

       


    });

   

});

</script>