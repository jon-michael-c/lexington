<header class="banner bg-white text-xs sticky z-[999] top-0 left-0  content-grid  ">
    <nav class="navbar breakout">
        <div class="flex flex-wrap items-center justify-between mx-auto py-2 lg:py-4 gap-2 ">
            @if ($siteLogo)
                <a href="{{ $homeUrl }}"
                    class="flex items-center max-w-[115px] lg:max-w-[130px] space-x-3 rtl:space-x-reverse">
                    <img src="{{ $siteLogo }}" class="w-full lg:w-[130px]"
                        alt="{{ get_bloginfo('name', 'display') }} logo" />
                </a>
            @endif
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-lg text-gray-500 rounded-lg lg:hidden "
                aria-controls="navbar-default" aria-expanded="false" id="navbar-toggler">
                <span class="sr-only">Open main menu</span>
                <div class="hamburger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="navbar-collapse flex flex-col-reverse w-full lg:block lg:w-auto" id="navbarBasic">
                @if ($primaryMenu && is_array($primaryMenu) && count($primaryMenu) > 0)
                    @include('components.menus.primary', ['menu' => $primaryMenu])
                @endif
            </div>
        </div>
    </nav>
</header>
