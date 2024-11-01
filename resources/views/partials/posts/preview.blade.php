<a href="{{ get_permalink($id) }}" class="post-preview">
    <div class="grid gap-2 sm:px-8 py-6">
        <div>
            <p class="uppercase text-sm text-magenta">{{ get_the_date('d M Y', $id) }}</p>
        </div>
        <div>
            <h5 class="post-title text-charcoal capitalize font-normal">{!! get_the_title($id) !!}</h5>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="22" viewBox="0 0 12 22" fill="none">
                <path d="M1 1L11 11L1 21" stroke="#242132" />
            </svg>
        </div>
    </div>
</a>
