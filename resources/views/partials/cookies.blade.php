<div id="cookies" class="content-grid">
    <div
        class="cookies-banner flex justify-center flex-col items-center h-full text-center text-charcoal p-8 full-width">
        <div class="cookies-text">
            {!! get_field('cookie_text', 'option') !!}
        </div>
        <div class="cookies-actions flex justify-center items-center gap-4">
            <div class="flex gap-4 items-center">
                <button id="preferences" class="wp-element-button">Preferences</button>
                <button id="accept-cookies" class="wp-element-button">Accept</button>
                <button id="decline-cookies" class="wp-element-button">Decline</button>
            </div>
        </div>
        <div class="cookies-policy">
            <div class="content">
                {!! get_field('cookie_policy', 'option') !!}
            </div>
            <div class="cookies-exit">
                <span id="close-policy">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="rgba(140, 29, 64, 1)"
                            d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6z" />
                    </svg>
                </span>
            </div>
        </div>

    </div>



</div>
