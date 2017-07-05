<div class="admin-sidebar">
    <a href="/"><img class="sidebar-brand" src=""/></a>

    <ul class="admin-sidebar-nav">
        <li class="@if (Route::currentRouteName() == 'dashboard')active @endif"><a href="/admin">Dashboard</a></li>
        <li class="@if (Route::currentRouteName() == 'blogslist' || Route::currentRouteName() == 'editBlog')active @endif"><a href="/admin/blogs">Blogs</a></li>
        <li class="@if (Route::currentRouteName() == 'pages')active @endif"><a href="/admin/pages">Pages</a></li>
        {{--<li><a>Products (NOT DONE)</a></li>--}}
        <li class="@if (Route::currentRouteName() == 'events')active @endif"><a href="/admin/events">Events</a></li>
        <li class="@if (Route::currentRouteName() == 'employees')active @endif"><a href="/admin/employees">Employees</a></li>
    </ul>
</div>