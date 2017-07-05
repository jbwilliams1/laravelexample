<div class="nav-hero">
    <div class="nav-container container">
        <nav role="nav">
            <a class="logo-anchor" href="/"><div class="logo"></div></a>
            <ul class="nav-menu">
                <li><a class="@if (Route::currentRouteName() == 'home')active @endif" href="/">Home</a></li>            
                <li><a class="@if (Route::currentRouteName() == 'about')active @endif" href="/about">About</a></li>
                <li><a class="@if (Route::currentRouteName() == 'contact')active @endif" href="/contact">Contact</a></li>
            </ul>
            <div class="dropdown mobile-nav">
                    <i class="fa fa-bars dropdown-toggle"></i>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a class="@if (Route::currentRouteName() == 'home')active @endif" href="/" class="active">Home</a></li>                    
                        <li><a class="@if (Route::currentRouteName() == 'about')active @endif" href="/about">About</a></li>
                        <li><a class="@if (Route::currentRouteName() == 'contact')active @endif" href="/contact">Contact</a></li>
                    </ul>
            </div>
        </nav>
    </div>
</div>
