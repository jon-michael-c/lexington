<footer class="content-grid bg-charcoal w-full overflow-hidden">
    <div class="full-width w-full border-t-[9px] border-solid border-magenta overflow-hidden relative">
        <div class="breakout">
            <div class="bg-image w-full inner-full absolute left-0 top-0 opacity-10  z-index-[-1]">
                <img src="https://lexington.local/app/uploads/2024/10/istockphoto-954282570-2048x2048-1.jpg"
                    alt="footer image" class="w-full h-full object-bottom" />
            </div>
            <div class="grid grid-cols-2 sm:py-8">
                <div class="flex flex-col justify-between items-start">
                    <div class="w-[130px]">
                        <a href="{{ home_url() }}" class="flex">
                            <img src="{{ $footerLogo }}" alt="{{ $siteName }} Logo" />
                        </a>
                    </div>
                    <div class="text-white w-full max-w-[285px]">
                        <p>Lexington Partners is a subsidiary of Franklin Templeton.</p>
                    </div>
                </div>
                <div>
                    @if ($footerMenu && is_array($footerMenu) && count($footerMenu) > 0)
                        @include('components.menus.footer', ['menu' => $footerMenu])
                    @endif
                </div>
            </div>
        </div>
        <div class="full-width bg-charcoal py-4 relative z-5">
            <div class="breakout">
                <p class="text-white">{{ $copyright }}</p>
            </div>
        </div>
    </div>
</footer>
