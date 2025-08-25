<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<div class="sidebar">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{ route('admin.dashboard') }}" class="sidebar__main-logo"><img
                    src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="@lang('image')"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{ menuActive('admin.dashboard') }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                        <i class="menu-icon las la-chart-line"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>
                @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->user_type === 0)
                    <li class="sidebar__menu-header">@lang('Users Management')</li>

                    <li class="sidebar-menu-item {{ menuActive('admin.users.*') }}">
                        <a href="{{ route('admin.users.active') }}" class="nav-link ">
                            <i class="menu-icon las la-user"></i>
                            <span class="menu-title">@lang('All Users')</span>
                            @if ($bannedUsersCount > 0 || $emailUnverifiedUsersCount > 0 || $mobileUnverifiedUsersCount > 0)
                                <div class="blob white"></div>
                            @endif
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.module.*') }}">
                        <a href="{{ route('admin.module.list') }}" class="nav-link ">
                            <i class="menu-icon las la-th-large"></i>
                            <span class="menu-title">@lang('Modules')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.stream.*') }}">
                        <a href="{{ route('admin.stream.list') }}" class="nav-link ">
                            <i class="menu-icon las la-broadcast-tower"></i>
                            <span class="menu-title">@lang('Stream')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.category.*') }}">
                        <a href="{{ route('admin.category.list') }}" class="nav-link ">
                            <i class="menu-icon las la-list-alt"></i>
                            <span class="menu-title">@lang('Categories')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.category2.*') }}">
                        <a href="{{ route('admin.category2.list') }}" class="nav-link ">
                            <i class="menu-icon las la-list-alt"></i>
                            <span class="menu-title">@lang('2nd Categories')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.subcategory.*') }}">
                        <a href="{{ route('admin.subcategory.list') }}" class="nav-link ">
                            <i class="menu-icon las la-sitemap"></i>
                            <span class="menu-title">@lang('Subcategories')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.salaryrange.*') }}">
                        <a href="{{ route('admin.salaryrange.list') }}" class="nav-link ">
                            <i class="menu-icon las la-money-bill-wave"></i>
                            <span class="menu-title">@lang('Salary Range')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.jobscope.*') }}">
                        <a href="{{ route('admin.jobscope.list') }}" class="nav-link ">
                            <i class="menu-icon las la-briefcase"></i>
                            <span class="menu-title">@lang('Job Scope')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.pathtype.*') }}">
                        <a href="{{ route('admin.pathtype.index') }}" class="nav-link ">
                            <i class="menu-icon las la-road"></i>
                            <span class="menu-title">@lang('Path Type')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.path.*') }}">
                        <a href="{{ route('admin.path.list') }}" class="nav-link ">
                            <i class="menu-icon las la-briefcase"></i>
                            <span class="menu-title">@lang('Career Path')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.entrance.*') }}">
                        <a href="{{ route('admin.entrance.list') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Entrance Exam')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.institution.*') }}">
                        <a href="{{ route('admin.institution.list') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Institution')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.Masterclass.*') }}">
                        <a href="{{ route('admin.Masterclass.index') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Master Class')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.scholarship.*') }}">
                        <a href="{{ route('admin.scholarship.index') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Scholarship')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.bannerslider.*') }}">
                        <a href="{{ route('admin.bannerslider.list') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Banner Slider')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.careerplan.*') }}">
                        <a href="{{ route('admin.careerplan.list') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Career Plan')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item  {{ menuActive('admin.subscriber.*') }}">
                        <a href="{{ route('admin.subscriber.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.subscriber.index') }}">
                            <i class="menu-icon las la-envelope"></i>
                            <span class="menu-title">@lang('Subscribers') </span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item  {{ menuActive('admin.plan.*') }}">
                        <a href="{{ route('admin.plan.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.plan.index') }}">
                            <i class="menu-icon las la-gift menu-icon"></i>
                            <span class="menu-title">@lang('Plans') </span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.team.bookings') }}">
                        <a href="{{ route('admin.team.bookings') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Bookings')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.upgradeplan.list') }}">
                        <a href="{{ route('admin.upgradeplan.list') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Upgrade Plan')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.add.quiz') }}">
                        <a href="{{ route('admin.add.quiz') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Quiz')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item  {{ menuActive('admin.plan.*') }}">
                        <a href="{{ route('admin.plan.subscription') }}" class="nav-link"
                            data-default-url="{{ route('admin.plan.subscription') }}">
                            <i class="menu-icon las la-gift menu-icon"></i>
                            <span class="menu-title">@lang('Subscriptions') </span>
                        </a>
                    </li>


                    <li class="sidebar-menu-item  {{ menuActive('admin.service.index') }}">
                        <a href="{{ route('admin.service.index') }}" class="nav-link"
                            data-default-url="{{ route('admin.service.index') }}">
                            <i class="menu-icon lab la-servicestack menu-icon"></i>
                            <span class="menu-title">@lang('Services') </span>
                        </a>
                    </li>


                    <li class="sidebar__menu-header">@lang('Web Management')</li>
                    <li class="sidebar-menu-item {{ menuActive('admin.event_title.*') }}">
                        <a href="{{ route('admin.event_title.list') }}" class="nav-link ">
                            <i class="menu-icon las la-globe-americas"></i>
                            <span class="menu-title">@lang('Event Title')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.event.*') }}">
                        <a href="{{ route('admin.event.list') }}" class="nav-link ">
                            <i class="menu-icon las la-globe-americas"></i>
                            <span class="menu-title">@lang('Events')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.clientele.*') }}">
                        <a href="{{ route('admin.clientele.index') }}" class="nav-link ">
                            <i class="menu-icon las la-globe-americas"></i>
                            <span class="menu-title">@lang('Clientele')</span>
                        </a>
                    </li>

                    <li class="sidebar__menu-header">@lang('countries')</li>
                    <li class="sidebar-menu-item {{ menuActive('admin.countries.*') }}">
                        <a href="{{ route('admin.countries.index') }}" class="nav-link ">
                            <i class="menu-icon las la-globe-americas"></i>
                            <span class="menu-title">@lang('All countries')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.states.*') }}">
                        <a href="{{ route('admin.states.index') }}" class="nav-link ">
                            <i class="menu-icon las la-map-marked-alt"></i>
                            <span class="menu-title">@lang('States')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.districts.*') }}">
                        <a href="{{ route('admin.districts.index') }}" class="nav-link ">
                            <i class="menu-icon las la-map-marker-alt"></i>
                            <span class="menu-title">@lang('Districts')</span>
                        </a>
                    </li>

                    <li class="sidebar__menu-header">@lang('Orders')</li>
                    <li class="sidebar-menu-item {{ menuActive('admin.service.approved.orders') }}">
                        <a href="{{ route('admin.service.approved.orders') }}" class="nav-link ">
                            <i class="la la-cart-plus menu-icon"></i>
                            <span class="menu-title">@lang('All Orders')</span>
                        </a>
                    </li>





                    <li class="sidebar__menu-header">@lang('Report')</li>
                    <li
                        class="sidebar-menu-item {{ menuActive(['admin.report.transaction', 'admin.report.transaction.search']) }}">
                        <a href="{{ route('admin.report.transaction') }}" class="nav-link">
                            <i class="menu-icon las la-credit-card"></i>
                            <span class="menu-title">@lang('Transactions')</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-menu-item {{ menuActive(['admin.report.login.history', 'admin.report.login.ipHistory']) }}">
                        <a href="{{ route('admin.report.login.history') }}" class="nav-link">
                            <i class="menu-icon las la-sign-in-alt"></i>
                            <span class="menu-title">@lang('Login Activities')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.report.notification.history') }}">
                        <a href="{{ route('admin.report.notification.history') }}" class="nav-link">
                            <i class="menu-icon las la-bell"></i>
                            <span class="menu-title">@lang('Notifications')</span>
                        </a>
                    </li>
                    <li class="sidebar__menu-header">@lang('Help Desk')</li>
                    <li class="sidebar-menu-item {{ menuActive('admin.ticket.*') }}">
                        <a href="{{ route('admin.ticket.pending') }}" class="nav-link ">
                            <i class="menu-icon las la la-life-ring"></i>
                            <span class="menu-title">@lang('Support Ticket')</span>
                            @if (0 < $pendingTicketCount)
                                <div class="blob white">
                                </div>
                            @endif
                        </a>
                    </li>
                    <li class="sidebar__menu-header">@lang('Content Management')</li>


                    <li class="sidebar-menu-item {{ menuActive('admin.frontend.manage.*') }}">
                        <a href="{{ route('admin.frontend.manage.pages') }}" class="nav-link ">
                            <i class="menu-icon la la-pager"></i>
                            <span class="menu-title">@lang('Pages')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.frontend.TestimonialList*') }}">
                        <a href="{{route('admin.frontend.TestimonialList') }}" class="nav-link ">
                            <i class="menu-icon la la-user"></i>
                            <span class="menu-title">@lang('Testimonial')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.frontend.CareerImageList*') }}">
                        <a href="{{route('admin.frontend.CareerImageList') }}" class="nav-link ">
                            <i class="menu-icon la la-cogs"></i>
                            <span class="menu-title">@lang('CareerImage')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.frontend.sections*', 3) }}">
                            <i class="menu-icon la la-grip-horizontal"></i>
                            <span class="menu-title">@lang('Sections')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.frontend.sections*', 2) }} ">
                            <ul>
                                @php
                                    $lastSegment = collect(request()->segments())->last();
                                @endphp
                                @foreach (getPageSections(true) as $k => $secs)
                                    @if ($secs['builder'])
                                        <li
                                            class="sidebar-menu-item  @if ($lastSegment == $k) active @endif ">
                                            <a href="{{ route('admin.frontend.sections', $k) }}" class="nav-link">
                                                <i class="menu-icon las la-caret-right"></i>
                                                <span class="menu-title">{{ __($secs['name']) }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                                {{-- <li class="sidebar-menu-item  @if ($lastSegment == $k) active @endif ">
                                    <a href="" class="nav-link">
                                        <i class="menu-icon las la-caret-right"></i>
                                        <span class="menu-title">Set Testimonials</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar__menu-header">@lang('General Settings')</li>

                    <li class="sidebar-menu-item {{ menuActive('admin.setting.index') }}">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link">
                            <i class="menu-icon las la-globe"></i>
                            <span class="menu-title">@lang('Global Settings')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.setting.logo.icon') }}">
                        <a href="{{ route('admin.setting.logo.icon') }}" class="nav-link">
                            <i class="menu-icon las la-image"></i>
                            <span class="menu-title">@lang('Logo & Favicon')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item  {{ menuActive(['admin.language.manage', 'admin.language.key']) }}">
                        <a href="{{ route('admin.language.manage') }}" class="nav-link"
                            data-default-url="{{ route('admin.language.manage') }}">
                            <i class="menu-icon las la-language"></i>
                            <span class="menu-title">@lang('Language') </span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item sidebar-dropdown">
                        <a href="javascript:void(0)" class="{{ menuActive('admin.setting.notification*', 3) }}">
                            <i class="menu-icon las la-bell"></i>
                            <span class="menu-title">@lang('Email & Notification')</span>
                        </a>
                        <div class="sidebar-submenu {{ menuActive('admin.setting.notification*', 2) }} ">
                            <ul>
                                <li
                                    class="sidebar-menu-item {{ menuActive('admin.setting.notification.templates') }} ">
                                    <a href="{{ route('admin.setting.notification.templates') }}" class="nav-link">
                                        <i class="menu-icon las la-caret-right"></i>
                                        <span class="menu-title">@lang('All Templates')</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.setting.notification.global') }} ">
                                    <a href="{{ route('admin.setting.notification.global') }}" class="nav-link">
                                        <i class="menu-icon las la-caret-right"></i>
                                        <span class="menu-title">@lang('Global Template')</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.setting.notification.email') }} ">
                                    <a href="{{ route('admin.setting.notification.email') }}" class="nav-link">
                                        <i class="menu-icon las la-caret-right"></i>
                                        <span class="menu-title">@lang('Email Config')</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item {{ menuActive('admin.setting.notification.sms') }} ">
                                    <a href="{{ route('admin.setting.notification.sms') }}" class="nav-link">
                                        <i class="menu-icon las la-caret-right"></i>
                                        <span class="menu-title">@lang('SMS Config')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-menu-item {{ menuActive('admin.setting.socialite.credentials') }}">
                        <a href="{{ route('admin.setting.socialite.credentials') }}" class="nav-link">
                            <i class="menu-icon las la-users-cog"></i>
                            <span class="menu-title">@lang('Social Credentials')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{ menuActive('admin.seo') }}">
                        <a href="{{ route('admin.seo') }}" class="nav-link">
                            <i class="menu-icon las la-project-diagram"></i>
                            <span class="menu-title">@lang('SEO')</span>
                        </a>
                    </li>

                @else
                    <li class="sidebar-menu-item {{ menuActive('admin.team.bookings') }}">
                        <a href="{{ route('admin.team.bookings') }}" class="nav-link ">
                            <i class="menu-icon las la-graduation-cap"></i>
                            <span class="menu-title">@lang('Bookings')</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- sidebar end -->

@push('script')
    <script>
        if ($('li').hasClass('active')) {
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            }, 500);
        }
    </script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('.myTable');
        });
    </script>
@endpush
