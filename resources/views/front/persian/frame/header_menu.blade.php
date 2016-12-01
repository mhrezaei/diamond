<!-- START: Header -->
<header id="main-header">
    <div class="container">
        <a href="{{ url('') }}" id="logo"> <img src="{{ url('/' . Setting::get('site_logo')) }}" width="234"> </a>
        <!-- Menu -->
        <div class="f-l">
            <ul class="menu">
                <li><a href="{{ url('/login') }}" class="button green" id="auth-link"> {{ trans('front.login_signup') }} </a></li>
                <li><a href="{{ url('/pages/persian_about_page') }}"> {{ trans('front.about') }} </a></li>
                @if($data['header_menu'])
                <li> <a href="#"> {{ trans('front.our_services') }} </a>
                    <ul class="sub-menu">
                        @foreach($data['header_menu'] as $menu)
                        <li><a href="{{ $menu->say('link') }}">{{ $menu->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
                <li><a href="{{ url('/products') }}"> {{ trans('front.products') }} </a></li>
                <li><a href="{{ url('/faq') }}"> {{ trans('front.faq') }} </a></li>
                <li><a href="{{ url('/contact') }}"> {{ trans('front.contact_us') }}</a></li>
            </ul>
            <!-- Responsive Menu -->
            <a href="#" class="res-menu-toggle icon-menu"></a>
        </div>
    </div>
</header>
<!-- END: Header -->