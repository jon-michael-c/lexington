<div class="intro-bg"></div>
<section class="hero full-width relative  h-[620px] sm:h-[689px] pb-8 sm:pb-28 ">
    @include('components.intro')

    <div
        class="page-header-content absolute top-[10%] breakout w-full flex justify-start items-end pr-4 sm:pr-0 py-16 z-1 h-[530px] sm:top-0 sm:h-[581px]">
        <div class="bg-video z-[-4]">
            <video autoplay muted loop class="w-full h-full object-cover">
                <source src="/app/uploads/2024/10/lg_hero_video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="bg-gradient-1 absolute top-0 left-0 w-[85%] h-full z-[-1] "></div>
        <div class="bg-gradient-3 absolute top-0 left-0 w-full h-full z-[-3]"></div>

    </div>
    <div
        class="page-header-text relative bottom-[160px] pl-8 sm:pl-8  sm:bottom-[unset] z-[3] w-full flex gap-8 flex-col sm:flex-row items-end sm:pb-20 mt-auto">
        <div class="tagline w-full max-w-[550px] ">
            <div class="max-w-[595px]">
                <h1>{!! get_field('page_excerpt', get_the_ID()) !!}</h1>
            </div>
        </div>
        <div class=" w-[100vw] sm:absolute left-[47%] sm:bottom-[33%] h-[32px] z-[5]">
            <div class="stripe absolute sm:relative w-[100vw] bottom-0 opacity-0"></div>
        </div>
        <div class="w-[50%] h-[226px] absolute bottom-[40px] right-0 z-[10] px-12 py-10 ">
            <div class="hero-text-container bg-magenta w-full h-full absolute top-0  z-[-1] opacity-90"></div>
            <div class="hero-text flex flex-col justify-between h-full w-full">
                <div class="text-white">
                    <h4 class="font-normal text-[20px]">
                        Lexington Partners is one of the world’s largest and most trusted managers of secondary private
                        equity
                        and co-investment funds.
                    </h4>
                </div>
                <div class="text-white mt-auto flex items-center gap-4">
                    <a href="{{ home_url('/investment-strategies') }}" class="uppercase">Our Investment Strategies</a>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="22" viewBox="0 0 12 22"
                            fill="none">
                            <path d="M1 1L11 11L1 21" stroke="white" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="bg-block inner-full w-[75vw] sm:w-[40vw] h-[540px] sm:h-[584px] absolute top-0 sm:top-[unset] sm:bottom-0 left-0 z-[-5]">
    </div>
    <div
        class="green-2 inner-full bg-mist-300 w-[50vw] h-[270px] sm:h-[428px] absolute top-[8%] sm:top-[15%] bottom-[35%] right-0 z-[-6]">
    </div>
    <div
        class="red-1 breakout bg-magenta w-[16px] sm:w-[32px] h-[183px] absolute bottom-[40%] sm:bottom-[25%] left-[-8px] sm:left-[-16px] z-[2]">
    </div>
    <div
        class="video-control breakout w-[16px] sm:w-[32px] h-[16px] sm:h-[32px] absolute bottom-[90px] right-[-12px] sm:right-[-56px] z-[2] opacity-0">
        <div class="hero-video-btn">
            <p> || </p>
        </div>
    </div>
</section>
