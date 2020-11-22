@extends('uikit::master')

@section('body')
    {{-- Top navigation bar --}}
    @include('uikit::partials.navbar.navbar-top')

    {{--Grid layout for sidebar and main content--}}
    <div uk-grid class="uk-grid-collapse uk-height-viewport" style="margin-top: -80px; padding-top: 80px">
        <aside class="uk-light uk-visible@m" id="sidebar"
               style="width: 210px; background-color: #222; padding: 20px; position: fixed; top: 80px; bottom: 0; overflow: auto">
            @include('uikit::partials.sidebar.sidebar-main')
        </aside>
        <div class="uk-width-expand uk-flex uk-flex-column uk-flex-between content-wrapper">
            <div class="uk-padding uk-flex-1">
                @yield('content')
            </div>
            @include('uikit::partials.footer.footer-main')
        </div>
    </div>

    {{-- Off-canvas element to show in mobile displays --}}
    <div id="sidebar-mobile" uk-offcanvas="overlay: true; container: #app" class="uk-hidden@m">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>

            @include('uikit::partials.sidebar.sidebar-main')
        </div>
    </div>
@endsection
