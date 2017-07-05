@include('layouts.admin.partials.adminMasterHeader')
<div class="wrapper {{ !empty($page_class) ? $page_class : ''}}">
    @include('layouts.admin.partials.adminSidebarNav')
    <div class="admin-content">
        @yield('content')
    </div>
    @include('layouts.admin.partials.adminMasterFooter')
    <div class="clearfix"></div>
</div>
<script>
    $(document).ready(function(){
       setTimeout(function(){
           $('.alert').fadeOut();
       }, 5000)
    });
</script>