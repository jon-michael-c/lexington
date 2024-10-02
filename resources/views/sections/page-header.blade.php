@php
    $header_text = get_field('page_excerpt') ?: get_the_title();
@endphp

<section class="page-header full-width relative h-[620px] sm:h-full pb-8 sm:pb-28">
    <div
        class="page-header-content absolute top-[10%] breakout w-full flex justify-start items-end pr-4 sm:pr-0 py-16 z-1 h-[430px] sm:top-0 sm:h-[446px]">
        <div class="bg-image relative z-[-4]">
            <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" />
        </div>
        <div class="bg-gradient-1 absolute top-0 left-0 w-[85%] h-full z-[-1] "></div>
        <div class="bg-gradient-2 absolute top-0 left-0 w-full h-full z-[-2]  mix-blend-multiply"></div>
        <div class="bg-gradient-3 absolute top-0 left-0 w-full h-full z-[-3]"></div>

    </div>
    <div
        class="page-header-text relative bottom-[160px] pl-8 sm:pl-0 sm:bottom-[unset] z-[3] w-full flex gap-8 flex-col sm:flex-row items-end sm:pb-14 mt-auto">
        <div class="w-full max-w-[550px] ">
            @include('components.breadcrumb')
            <div class="max-w-[595px]">
                <h1 class="text-white">{!! $header_text !!}</h1>
            </div>
        </div>
        <div class=" w-full sm:relative left-0 sm:bottom-[12px] h-[32px] z-[5]">
            <div class="stripe absolute sm:relative w-[100vw] bottom-0"></div>
        </div>
    </div>
    <div
        class="inner-full bg-mist w-[75vw] sm:w-[50vw] h-[540px] sm:h-[424px] absolute top-0 sm:top-[unset] sm:bottom-0 left-0 z-[-5]">
    </div>
    <div class="inner-full bg-mist-300 w-[50vw] h-[270px] absolute top-[3%] sm:top-[unset] bottom-[35%] right-0 z-[-6]">
    </div>
    <div
        class="breakout bg-magenta w-[16px] sm:w-[32px] h-[183px] absolute bottom-[40%] sm:bottom-[25%] left-[-8px] sm:left-[-16px] z-[2]">
    </div>
</section>
