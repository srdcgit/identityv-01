<link rel="stylesheet" href="{{ asset('assets/presets/themesFive/nav/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/presets/themesFive/nav/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/presets/themesFive/section-css/hero.css') }}">
<link rel="stylesheet" href="{{ asset('assets/presets/themesFive/section-css/about.css') }}">


@php
    $languages = App\Models\Language::all();
    $pages = App\Models\Page::where('tempname', $activeTemplate)->get();
@endphp
<style>
body #kenytChatBubble.style1.unreadcount[data-unreadcount]:after{top:-185px;z-index:2147483646;}
body #kenytChatBubble.style1 #kenytBubbleContainer{bottom:140px;}
#newcommonloginpmodal_popup{z-index:999999999;}
#newcommonsignupupmodal_popup{z-index:999999999;}
/* new icon css*/
.nav > li > a:hover, .nav > li > a:focus{background-color: #fff;}
header.latest-header .header-right .free-dsk{display:inline-block;}
header.latest-header .header-right .free-mob{display:none;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li.free-dsk a{transition:all ease 0.5s;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li.free-dsk a:hover{color:#f27f7a}
/* new icon css*/
.inner-banner .navbar{display:none;}
.inner-banner{min-height:200px;}
.innerbanner-text .innerbanner-heading{top:1.0em;}
.header-banner{padding:0px 0px 80px 0px}
.header-banner header{display:none;}
.header-banner .banner{margin-top:0;padding-top:80px;}
.header-banner header.latest-header{display:block;}
header.latest-header{padding:5px 0 7px;background-color:#fff;
        border-bottom: 1px solid #efefef;
    box-shadow: 0 0 .7rem -.1rem #e6e6e6;
}
header.latest-header .row{margin-left:-15px;margin-right:-15px;}
header.latest-header .top-nav button{padding:0;border:none;background:transparent;background-image:none;text-shadow:none;box-shadow:none;-webkit-box-shadow:none;}
header.latest-header .top-nav button .icon-bar{display: block;width: 18px;height: 2px;border-radius: 1px;background-color: #ac2626;}
header.latest-header .top-nav button .icon-bar + .icon-bar {margin-top: 3px;}
header.latest-header .menu-logo .top-nav {float: left;width: 40px;margin-top: 14px;}
header.latest-header .menu-logo .logo {width:130px!important;float:left;margin:0;padding:0;}
header.latest-header .menu-logo .logo img{width:100%;}
header.latest-header a.logo.logo-mobile {display: none;}
header.latest-header .top-nav button:focus,header .top-nav button:active{outline:none;}
header.latest-header .header-right .navbar-nav{float:right;}
header.latest-header .header-right .navbar-nav li a{border:none;padding:0;text-shadow:none;box-shadow:none;-webkit-box-shadow:none;}
header.latest-header .nav .open > a, header.latest-header .nav .open > a:hover, header.latest-header .nav .open > a:focus{background-color:transparent;}
header.latest-header .header-right{text-align:right;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon{padding:12px 0 0 0;width:100%;float:left;}
/* header.latest-header .nav > li > a:hover, header.latest-header  .nav > li > a:focus{background-color:transparent;} */
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li:first-child{margin-right:0;padding-right:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li:first-child a{margin-top:-3px;padding-right:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li{float:right;margin-left:0;margin-right:10px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.dropdown{margin-right:15px;float:right;margin-left:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a{font-size:15px;padding:2px 5px;color:#000;text-shadow:none;border:none;font-family: 'Lato', sans-serif;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon i img{width:18px;margin:-6px 0 0 0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a.free-sign-btn{background: #163a76;border-radius:5px;color: #fff;font-family: 'Lato', sans-serif;padding: 2px 5px;transition:all ease 0.5s;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a.free-sign-btn:hover{background-color:#ac2626;}
header.latest-header .header-right .navbar-nav > li > .dropdown-menu{margin-top:0px;    width: 350px; padding:10px !important;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li.learning-home-drop-down .dropdown-menu.sec, header.latest-header .header-right .navbar-nav.pwr-dash-icon > li > .dropdown-menu.sec{right:-50px;border:none;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li.learning-home-drop-down .dropdown-menu.sec{right:-50px;top:41px;}
header.latest-header .header-right .navbar-nav > li > .dropdown-menu.sec{min-width:120px;padding:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li > .dropdown-menu.sec{left:inherit;right:1px;top:40px;border-radius:5px;overflow:hidden;text-align:center;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.sign-in-email{background: #e34134;}
header.latest-header .header-right .navbar-nav > li > .dropdown-menu.sec li:first-child{border:none;}
header.latest-header .header-right .navbar-nav > li > .dropdown-menu.sec li{padding:5px;margin-right:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon .dropdown-menu > li.rv-bg-w a{font-size:12px !important; padding-left:10px !important;}
header .header-right .navbar-nav.pwr-dash-icon li.learning-home-drop-down .dropdown-menu li a{padding:5px 15px;color:#fff;}
.logout-new {border-top: 1px solid #e5e5e5;}
.logout-new a{color:#b1b1b1;}
header.latest-header li.dropdown.learning-home-drop-down.courses-dropdown i img{width:25px;margin-top:-1px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.dropdown.power-drop-down.dashboad-drop-down a i img{width:25px;margin-top:-6px;margin-right:15px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.dropdown.power-drop-down a i img{width:22px;margin-top:0px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.dropdown.power-drop-down{margin-right:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon .dropdown-menu > li:hover{background:#000;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon .dropdown-menu > li > a:hover{background:#000; border-radius:4px;}
/*  header.latest-header .header-right .navbar-nav.pwr-dash-icon .dropdown-menu > li > a:focus{background-color:transparent;background-image:none;} */ 
header.latest-header .header-right .navbar-nav.pwr-dash-icon .dropdown-menu > li > a{color:#fff; padding:10px 5px !important;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.existing-usr-login{background:#fff;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.existing-usr-login a{padding:5px 15px;}
header .header-right .navbar-nav > li > .dropdown-menu.sec li.mycourses_list{color:#fff;background:#e34134;padding:10px;}
header li.dropdown.learning-home-drop-down.courses-dropdown li{background:#013b49;margin:0;}
header.latest-header .header-right .navbar-nav > li > .dropdown-menu.sec li a i{color:#b1b1b1;}

header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a i.fa.fa-check-circle {color: #02a451;font-size: 17px;padding: 0px 5px;}
.banner-inner .navbar.navbar-default{display:none;}

header.latest-header .dropdown .btn{padding:0;background-color:transparent;}
header.latest-header .navbar{margin-bottom:0;border-radius:0;min-height:auto;border:none;display: flex;align-items: center;justify-content: space-between;}
header.latest-header .navbar-header {display: flex;align-items: center; justify-content: flex-start;}
header.latest-header .navbar-brand {padding:0 15px;}
header.latest-header .navbar-brand img {}
header.latest-header .navbar-nav {margin-right:0;margin-top:0;margin-bottom:0;}
header.latest-header .navbar-nav>li>a {padding-top:0;padding-bottom:0;}

header.latest-header .navbar-right {margin-left: auto;}
header.latest-header .navbar-right li a{display:inline-block;line-height:51px;}

header.latest-header .dropdown-menu {position: absolute;left: 0;display: none;background-color: #fff;box-shadow:none;border:none;width: 200px;padding:0;margin:16px 0 0;border-radius:0;}
header.latest-header .dropdown-menu>li>a{padding:10px 15px;}
header.latest-header .dropdown-menu>li>a:hover, header.latest-header .dropdown-menu>li>a:focus{background-color:#ac2626;color:#fff;background-image:none;}
header.latest-header .dropdown.open .dropdown-menu {display: block;}
header.latest-header .navbar-toggle {border: none;background: transparent;}
header.latest-header .icon-bar {background-color: #ac2626;height: 3px;width: 25px;margin: 4px auto;display:block;}
header.latest-header .navbar-nav>li>a.free-sign-btn span{padding:8px 15px;border-radius:5px;background-color:#163a76;line-height:20px;color:#fff;}
header.latest-header .navbar-nav>li>a:hover, header.latest-header .navbar-nav>li>a:focus{background-color:transparent;}
header.latest-header .navbar-nav>li>a.login{color:#000;padding:0}
header.latest-header .navbar-nav>li>a.login:hover{color:#ac2626}
header.latest-header .navbar-nav>li>a:hover span{background-color:#ac2626}
header.latest-header .navbar-nav.navbar-right:last-child{margin-right:0}
header.latest-header .navbar-right{float:right!important;}

.mk-header-alerts {position: sticky;top: 0;width: 100%;left: 0;z-index: 99}
.mk-alert-wrapper {position: relative;}
.mk-header-alert-main {display: block;font-family: arial;font-size: 13px;position: relative;text-decoration: none !important;z-index: 1;}
.mk-header-alerts .mk-alert-wrapper {background-color: #ff0000;color: #fff}
.mk-header-alert-main .mk-main-alert-new {margin: auto auto;}
.mk-header-alert-main .mk-alert-content-wrapper {margin: 0 auto;position: relative;z-index: 2;}
.mk-header-alert-main .mk-alert-content {display: flex;align-items: center;justify-content: center;width: 100%;margin: 0 auto;padding: 3px 6px}

.mk-header-alert-main .mk-alert-text {color: #fff;text-decoration: none;font-weight: 300;position: relative;}
.mk-header-alert-main .mk-alert-text strong {font-weight: 600;}
.mk-header-alert-main .mk-btn-wa-cta {position: relative;background-color: #40c351 !important;color: #fff !important;padding: 3px 6px;font-weight: 600;border-radius: 4px;
text-decoration: none;display: inline-block;text-align: center;}
.mk-call-bt {color: #fff;font-weight: 600}
.mk-call-bt:focus,.mk-call-bt:hover {color: #efefef !important}


@media screen and (max-width: 767px){
	/* new icon css*/
	header.latest-header .header-right .free-dsk{display:none;}
header.latest-header .header-right .free-mob{display:block;}
/* new icon css*/
.rv-dropdown-list  li a{white-space:inherit;}

.mk-header-alerts {text-align: center;}
.mk-header-alert-main {font-size: 12px;line-height: 12px}

header.latest-header .navbar-brand img{width:140px;}	
header.latest-header .dropdown-menu{margin:17px 0 0;}
header.latest-header{padding:10px 0;}	
header.latest-header .nav>li{display:inline;}
header.latest-header .navbar-right li a{line-height:44px;}
header.latest-header .navbar-nav>li>a.free-sign-btn span{padding:7px 12px;font-size:13px;}
header.latest-header .navbar-nav>li>a.free-sign-btn.login{font-size:13px;}

}
@media screen and (max-width: 532px){
	header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a{font-size:13px;}
	header.latest-header .header-right .navbar-nav.pwr-dash-icon li.dropdown{margin-right:9px;}
}
@media screen and (max-width: 479px){

header.latest-header .dropdown-menu{margin-top:10px;}	
header.latest-header{padding:2px 0 5px;}	
	header.latest-header .menu-logo .top-nav{width:28px;margin:9px 0 0 -8px;}
	header.latest-header .menu-logo .logo{width:115px!important;padding-top:2px;}
	header.latest-header .header-right .navbar-nav.pwr-dash-icon .learning-home-drop-down.courses-dropdown i img{width:21px;margin-top:-1px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li.learning-home-drop-down .dropdown-menu.sec{top:32px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li.dropdown.power-drop-down.dashboad-drop-down > .dropdown-menu.sec{right:-26px;top:33px;}	
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li.dropdown.power-drop-down > .dropdown-menu.sec{right:-9px;top:33px;}	
header.latest-header .header-right .navbar-nav{margin:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a{font-size:13px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.dropdown{margin-right:4px;top:-2.5px}
header.latest-header .container{padding:0 15px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.dropdown.power-drop-down.dashboad-drop-down a i img{margin-right:0;}
header.latest-header  .header-right .navbar-nav.pwr-dash-icon .learning-home-drop-down i img{width:15.5px;margin-top:-3px;}
header.latest-header  .header-right .navbar-nav.pwr-dash-icon li.dropdown.power-drop-down.dashboad-drop-down a i img{width:23px;}
header.latest-header  .header-right .navbar-nav.pwr-dash-icon li.dropdown.power-drop-down a i img{width:20px;}

header.latest-header .header-right .navbar-nav.pwr-dash-icon > li{margin-left:0;margin-right:0;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a.free-sign-btn{padding:0 4px;margin:0 0 0 1px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon > li > .dropdown-menu.sec{position:absolute;}

/* new icon css*/
header .header-right .navbar-nav.pwr-dash-icon li.learning-home-drop-down .dropdown-menu li a{padding:0;font-size:12px;}
header.latest-header .header-right .navbar-nav.pwr-dash-icon li.existing-usr-login a{padding:0;font-size:12px;}
header.latest-header .header-right .navbar-nav > li > .dropdown-menu.sec{min-width:100px}
header.latest-header .menu-logo{width:43%;padding-right:5px;}
header.latest-header .header-right{width:57%;padding-left:5px;}
/* new icon css*/

header.latest-header .navbar-brand{padding:0 5px;}
header.latest-header .navbar-brand img {height:38px;width:auto;}
header.latest-header .navbar-right li a{line-height:38px;}
header.latest-header .navbar-nav>li>a.free-sign-btn{padding-left:5px;padding-right:5px;}

header.latest-header .navbar-nav>li>a.free-sign-btn span{padding:6px 8px;font-size:12px;}	
header.latest-header .navbar-nav>li>a.login{font-size:12px;}
header.latest-header .icon-bar{margin:3px auto;width:22px;}

}
/*New Dropdown menu*/
.rv-dropdown-list {min-width: 175px !important}
.rv-dropdown-list  li a{color: #fff;text-decoration: none;padding: 10px;display: block;font-size: 14px !important}
.rv-dropdown-list  li a i{padding-right: 12px;}
.rv-dropdown-list  li{border-radius: 0px; text-align: left}
.rv-dropdown-list   .rv-bg-g{background-color: #067519;}
.rv-dropdown-list   .rv-bg-g a{padding:  5px 5px !important}  
.rv-dropdown-list  .rv-bg-r{background-color:  #e34134;}
.rv-dropdown-list  .rv-bg-r:hover{background-color:#be1003 ;}
.rv-dropdown-list  .rv-bg-g:hover{background-color: #18521f;}
.rv-dropdown-list  .rv-bg-w{background-color: #fff;}
.rv-dropdown-list  .rv-bg-w a{color: #000 !important;}
.rv-dropdown-list  .rv-bg-w:hover{background-color: #e7dede;}
.rv-dropdown-list  .rv-bg-w:hover a{color: #fff !important}
.rv-dropdown-list  .rv-b-b{border-bottom: 1px solid #f3efef;}
/**new-css 9 March 2023***/

.mk-active-user-main{ background-color: #fff !important;color: #b1b1b1}
.rv-dropdown-list  li{padding: 0 !important}
.rv-dropdown-list  li a{padding: 6px !important;}
.mk-login-text a{color: #000 !important;}
.mk-login-text a:hover{background:#fff !important;cursor: none !important; color: #000 !important}
.bg-danger-logout {background-color: #fff !important; }
.bg-danger-logout a{color: #000 !important}
.bg-danger-logout a:hover{color: #fff !important}
.mk-profile-menu a{background-color: #fff;color: #2b2b2b !important; border-bottom: 1px solid #ccc !important; }
.mk-profile-menu  a:hover{color: #fff !important}
.mk-angle-down-c{margin-top: 5px}

/**new-css 9 March 2023 End***/


/*New Dropdown menu End*/
@media screen and (max-width: 375px){
	header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a{font-size:12px;}
	header.latest-header .menu-logo{padding-right:5px;}
	header.latest-header .header-right{padding-left:5px;padding-right:10px;}
}
@media screen and (max-width: 360px){
	header.latest-header .menu-logo .logo{width:110px!important;margin-top:4px;}
}
@media screen and (max-width: 359px){
	header.latest-header .menu-logo .logo{width:100px!important;}
	header.latest-header .header-right .navbar-nav.pwr-dash-icon > li a{font-size:12px;}
	header.latest-header .menu-logo{padding-right:5px;}
	header.latest-header .header-right{padding-left:5px;}
}




</style>

<style>
    @media(max-width:960px) {
        .circle-container {
            margin-top: 100px;
        }
    }


    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .rotate-image {
        animation: rotate 2s linear infinite;
    }

    .grecaptcha-badge {
        width: 256px;
        height: 60px;
        display: block;
        transition: right 0.3s ease 0s;
        position: fixed;
        bottom: 14px;
        right: -186px;
        box-shadow: gray 0px 0px 5px;
        border-radius: 2px;
        overflow: hidden;
        opacity: 0;
    }

    .side-icon-bar {
        position: fixed;
        right: 0;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        z-index: 10;
    }

    .side-icon-bar a {
        display: block;
        text-align: center;
        padding: 16px;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
    }

    .side-icon-bar a:hover {
        background-color: #000;
    }

    .side-icon-bar-call {
        background: #3986dd;
        color: white;
        border-radius: 10px 0 0 0;
    }

    .side-icon-bar-whatsapp {
        background: #12af66;
        color: white;
    }

    .side-icon-bar-inquiry {
        background: #bb0000;
        color: white;
        border-radius: 0 0 0 10px;
    }

    .side-icon-bar-lightbox {
        display: none;
        position: fixed;
        top: 50%;
        right: 50px;
        transform: translateY(-50%);
        width: 300px;
        padding: 20px;
        background: white;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        z-index: 1000;
    }

    .side-icon-bar-lightbox-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .close-side-icon-bar-lightbox {
        cursor: pointer;
        font-size: 24px;
        color: #bbb;
    }

    .close-side-icon-bar-lightbox:hover {
        color: #000;
    }

    .side-icon-bar-lightbox-content {
        font-size: 16px;
        color: #333;
    }

    @media (max-width: 425px) {
        .side-icon-bar a {
            padding: 10px !important;
        }
    }
</style>

<style>
    .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
    }

    .lightbox-content {
        background: #fff;
        padding: 10px;
        margin: 100px auto;
        width: 100%;
        max-width: 500px;
        border-radius: 15px;
        text-align: center;
    }

    .lightbox-header {
        text-align: right;
    }

    .close-lightbox {
        cursor: pointer;
        font-size: 24px;
    }

    .lightbox-logo {
        width: 20%;
        margin: 20px 0;
    }

    .lightbox-button {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        font-size: 15px;
        /* background-color: #091e3e; */
        color: #fff;
        border-radius: 7px;
        text-decoration: none;
        margin: 10px;
    }

    .lightbox-button i {
        color: #c4c4c4;
        font-size: 20px;
        padding-right: 5px;
    }

    .team-btn {
        margin-right: 10px;
    }

    .team-btn a {
        border-radius: 5%;
    }

    .upgrade-btn{
        margin-left: 10px;
    }
</style>

<!-- ==================== Header End Here ==================== -->
{{-- <div class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="logo-area">
                <a class="navbar-brand logo" href="{{ route('home') }}"><img
                        src="{{ getImage(getFilePath('logoIcon') . '/logo_white.png', '?' . time()) }}"
                        alt="{{ config('app.name') }}" alt="@lang('logo')">
                    <div class="logo-bg"></div>
                </a>
            </div>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu mx-auto ps-lg-4 ps-0">
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::url() == url('/') . '/' . $page->slug ? 'active' : '' }}"
                                aria-current="page" href="{{ route('pages', [$page->slug]) }}">{{ __($page->name) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="nav-end d-lg-flex d-md-flex d-block align-items-center py-lg-0 py-1">
                    <div class="d-flex mx-2">
                        <div class="icon">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <select class="select-dir langSel">
                            @foreach ($languages as $language)
                                <option value="{{ $language->code }}" @if (Session::get('lang') === $language->code) selected @endif>
                                    {{ __($language->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @auth
                        <a class="btn--base mt-2 mt-lg-0" href="{{ route('user.home') }}">@lang('Dashboard')</a>
                    @else
                        <a class="btn--base mt-2 mt-lg-0" href="{{ route('user.login') }}">@lang('Sign In')</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div> --}}



<div class="side-icon-bar">
    <a href="tel:+91-9108510058" class="side-icon-bar-call"><i class="fa fa-phone-alt"></i></a>
    <a id="whatsappLink" href="https://wa.me/8249753459?text=Your%20predefined%20message" target="blank"
        class="side-icon-bar-whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
    <a id="contactForm" class="side-icon-bar-inquiry"><i class="fa fa-info"></i></a>
</div>

<div id="side-icon-bar-lightbox" class="side-icon-bar-lightbox" style="display:none;">
    <div class="side-icon-bar-lightbox-header">
        <span>
            <b style="font-size:22px">How can we help?</b><br>
            <p style="font-size: 12px;">Post your enquiry</p>
        </span>
        <span id="closeside-icon-bar-lightbox" class="close-side-icon-bar-lightbox">&times;</span>
    </div>

    <div class="side-icon-bar-lightbox-content">
        <div id="formContainer" class="form-containerr">
            {{-- <script src="https://www.google.com/recaptcha/api.js?render=6Lckir0mAAAAABcq7fsKxtLiCBPb58DXEHNqJR7p" async defer></script> --}}

            <!-- Form -->
            <form id="enquiry" method="Post" enctype="multipart/form-data"
                action=" {{ Route('admin.ibutton.store') }} ">
                @csrf
                <div class="field-control-group">
                    <input type="text" class="form-control" placeholder="Full Name" name="name" maxlength="100"
                        required>
                </div>
                <div class="field-control-group">
                    <input type="email" class="form-control" placeholder="Email ID" name="email" maxlength="100"
                        required>
                </div>
                <div class="field-control-group">
                    <input type="text" class="form-control" placeholder="Phone No." name="phone" maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);" required>
                </div>
                <div class="field-control-group">
                    <input type="textarea" class="form-control" placeholder="Anything we need to know?" name="note" maxlength="2000" style="height: 100px;width:100%;padding:20px;margin-top:5px"></textarea>
                </div>
                <button id="form-submit-button" class="btn btn-primary" type="submit" style="margin-top:5px">Submit</button>
            </form>
        </div>
    </div>
</div>


<div class="container-fluid topbar px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-10 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i> Bhubaneswar, Odisha</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+91 97768 08179, +91 94372 08179</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>connect@careermap.in</small>
            </div>
        </div>
        <div class="col-lg-2 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="#"><i
                        class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>
<header class="latest-header ee">
    <div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-5 col-xs-6 menu-logo">
				<!-- Single button -->
				<div class="btn-group top-nav">
				  <button type="button" class="" id="toggle-btn">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <ul class="dropdown-menu slide-menu" style="display:none;">
				      @foreach ($pages->where('menu_id', null) as $page)
											 <li><a class="nav-link {{ Request::url() == url('/') . '/' . $page->slug ? 'active' : '' }}"
                            aria-current="page"href="{{ route('pages', [$page->slug]) }}">{{ __($page->name) }}</a></li>
					@endforeach
				
				</ul>
				</div>
				 <a class="navbar-brand logo" href="{{ route('home') }}"><img style="max-height: 50px;"
                src="{{ getImage(getFilePath('logoIcon') . '/logo_white.png', '?' . time()) }}"
                alt="{{ config('app.name') }}" alt="@lang('logo')">
            <div class="logo-bg"></div>
        </a>
			</div>	
			<div class="col-lg-5 col-md-5 col-sm-7 header-search">
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 header-right">
							<ul class="nav navbar-nav pwr-dash-icon sn-res-dn" style="display: inline-block;">
						<li><a href="{{ route('user.login') }}">Log In</a> / <a href="{{ route('user.register') }}"> Register</a></li>
						</ul>
						</div>			
		</div>
	</div>
<div id="lightbox" class="lightbox-overlay">
        <div class="lightbox-content">
            <div class="lightbox-header">
                <span class="close-lightbox" onclick="toggleLightbox()"><i class="fas fa-times"></i></span>
            </div>
            <div class="lightbox-body text-center">
                <a class="navbar-brand logo" href="{{ route('home') }}"><img style="max-height: 60px;"
                        src="{{ getImage(getFilePath('logoIcon') . '/logo_white.png', '?' . time()) }}"
                        alt="{{ config('app.name') }}" alt="@lang('logo')">
                    <div class="logo-bg"></div>
                </a>
                <h5 style="margin-top: 15px; margin-bottom:15px; color:#ab2931">Welcome To SetMyCareer</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('admin.login') }}" class="btn btn-primary custom-btn"
                            style="background-color: #ab2931; color: white; padding: 10px 20px; text-align: center; border-radius: 5px; border: 1px solid #ab2931;">
                            <h5 style="margin: 0; color:#fff">Institute Login</h5>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('user.login') }}" class="btn btn-secondary custom-btn"
                            style="background-color: #ab2931; color: white; padding: 10px 20px; text-align: center; border-radius: 5px; border: 1px solid #ab2931;">
                            <h5 style="margin: 0; color:#fff">Student Login</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Tag Manager -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KDVDK9N');
    </script>

    <script>
        function toggleLightbox(event) {
            // Prevent default link action if event is passed
            if (event) {
                event.preventDefault();
            }

            // Toggle the visibility of the lightbox
            const lightbox = document.getElementById('lightbox');
            lightbox.style.display = (lightbox.style.display === 'block') ? 'none' : 'block';
        }
    </script>

    <!-- End Google Tag Manager -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show the form when the icon is clicked
            $("#contactForm").click(function() {
                $("#side-icon-bar-lightbox").fadeIn();
            });

            // Close the form when the close button is clicked
            $("#closeside-icon-bar-lightbox").click(function() {
                $("#side-icon-bar-lightbox").fadeOut();
            });
        });
    </script>
<script>

//Home Nav Button
$(document).ready(function(){
	$("#toggle-btn").click(function(){
		event.stopPropagation();
		$(".slide-menu").slideToggle();
	});
});
$(document).on("click", function(event){
	event.stopPropagation();
	var $trigger = $("#toggle-btn");
	if($trigger !== event.target && !$trigger.has(event.target).length){
		$(".slide-menu").slideUp();
	}
});
$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
});
jQuery(document).on('click','.loadnew_codenavbar',function() {
	jQuery(".slide-menu").slideToggle();
});
function loadnew_codeusernavbar(){
	jQuery(".userblopen").slideToggle();
	jQuery(".userblopenhomemenu").slideUp();
	jQuery(".userblopendashboard").slideUp();
	jQuery(".mycourseshomemenu").slideUp();
	event.stopPropagation();
}
function homemenulinkopen(){
	jQuery(".userblopenhomemenu").slideToggle();
	jQuery(".userblopen").slideUp();
	jQuery(".userblopendashboard").slideUp();
	jQuery(".mycourseshomemenu").slideUp();
	event.stopPropagation();
}
function userblopendashboard(){
	jQuery(".userblopendashboard").slideToggle();
	jQuery(".userblopen").slideUp();
	jQuery(".userblopenhomemenu").slideUp();
	jQuery(".mycourseshomemenu").slideUp();
	event.stopPropagation();
}
function mycourseslinkopen(){
	jQuery(".mycourseshomemenu").slideToggle();
	jQuery(".userblopendashboard").slideUp();
	jQuery(".userblopen").slideUp();
	jQuery(".userblopenhomemenu").slideUp();
	event.stopPropagation();
}
function showMenu(){
	$('.menuopen').slideToggle();
}

function loginsOpen(){
	$('.userblopen').slideToggle();
}

function showlogoutdivz(){
	$('#logoutDIVZ').slideToggle();
}
function submit_SearchForm()
{
	var searchText = $('#search_Bar').val();
	if(searchText == ''){
		$('#search_Bar').css('border','1px solid red');
	}
	else{
		$('#search_Bar').css('border','1px solid #dddddd');
		$('#myForm').submit();
	}
}
</script>
</header>
{{-- @include('presets.themesFive.components.botman') --}}

<!-- ==================== Header End Here ==================== -->
