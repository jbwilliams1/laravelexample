@include('layouts.partials.masterHeader')
<div class="wrapper {{ !empty($page_class) ? $page_class : ''}}">
    @include('layouts.partials.mainNav')
    @yield('content')
    @include('layouts.partials.masterFooter')
</div>