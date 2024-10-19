  @php
      $bgColor = '';

      if (isset($block->block->backgroundColor)) {
          $bgColor = 'bg-' . $block->block->backgroundColor;
      }

      $leftHeight = 'h-[706px]';
      $rightHeight = 'h-[850px]';
      if (isset($reverse) && $reverse) {
          $rightHeight = 'h-[556px]';
      }

      $contentHeight = 'h-[520px]';
      if (isset($reverse) && $reverse) {
          $contentHeight = 'h-[410px]';
      }

  @endphp
  <div class="inner-full absolute top-[50%] right-[50%] w-[100%] h-[706px] -translate-y-1/2 -z-[2] {{ $bgColor }}">
      <div class="absolute top-0 right-0 w-full h-full -z-[1] mix-blend-multiply opacity-50">
          @if (isset($image))
              <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover">
          @endif
      </div>
  </div>
  <div class="inner-full absolute top-[50%] right-0 w-[55%] {{ $rightHeight }} -translate-y-1/2 z-[-3] bg-mist-100">
  </div>
  <div class="overlay grid grid-cols-2 gap-8 items-center relative my-12 sm:my-36">
      <div class="h-full relative z-10 flex items-center justify-start p-16">
          <div>
              <InnerBlocks />
          </div>
      </div>
      <div class="{{ $contentHeight }} relative z-0 -ml-24 pl-32">
          @if (isset($items))
              <ol class="overlay-list h-full flex flex-col justify-between">
                  <div class="overlay-line"></div>
                  @foreach ($items as $item)
                      <li>
                          <div class="overlay-list-item">
                              <div class="overlay-content">
                                  <div class="relative">
                                      <div class="overlay-dot"></div>
                                      <h4 class="text-ocean">{{ $item['title'] }}</h4>
                                  </div>
                                  <p>{{ $item['content'] }}</p>
                              </div>
                          </div>
                      </li>
                  @endforeach
              </ol>
          @endif
      </div>
  </div>
