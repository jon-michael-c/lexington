@php
    $header_text = get_field('page_excerpt') ?: get_the_title();
@endphp

<section class="page-header full-width relative h-[330px] overflow-hidden sm:h-[510px] py-6 sm:pb-28 sm:pt-0">
    <div class="page-header-text breakout relative flex sm:items-center sm:h-[448px]">
        <div class="w-full  flex items-center relative gap-3 left-[-8px]  sm:pb-14 sm:gap-8 sm:mt-auto sm:left-[-16px]">
            <div class="breakout bg-magenta min-w-[16px] sm:min-w-[32px] h-[100px] sm:h-[183px] bottom-[50%]  z-[2]">
            </div>
            <div>
                <div class="w-full">
                    @include('components.breadcrumb')
                </div>
                <div class="w-fit max-w-[380px] sm:max-w-[600px]">
                    <h1 class="text-white text-[26px] sm:text-[50px]">{!! $header_text !!}</h1>
                </div>
            </div>
        </div>
        <div
            class="absolute w-[90%] h-[18px] bottom-[32px] left-[50%] -translate-x-1/2 sm:relative sm:-translate-x-0 sm:left-0 sm:bottom-0 sm:top-[90px] ">
            <div class="stripe absolute sm:relative"></div>
        </div>
        <div class="page-header-content absolute top-0 left-0  w-full h-full  z-[-1]">
            <div class="bg-image relative z-[-4]">
                <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" />
            </div>
            <div class="bg-gradient-1 absolute top-0 left-0 w-full h-full z-[-3] "></div>
            <div class="bg-gradient-2 absolute top-0 left-0 w-full h-full z-[-2]  "></div>
            <div class="bg-gradient-3 absolute top-0 left-0 w-[50%] h-full z-[-1]"></div>
        </div>
    </div>
    <div
        class="inner-full bg-mist w-[75vw] sm:w-[50vw] h-[540px] sm:h-[424px] absolute top-0 sm:top-[unset] sm:bottom-0 left-0 z-[-5]">
    </div>
    <div class="inner-full bg-mist-300 w-[50vw] h-[270px] absolute top-0 sm:top-[unset] bottom-[35%] right-0 z-[-6]">
    </div>

</section>
