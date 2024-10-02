   <ul class="flex flex-col md:flex-row gap-3 md:gap-6 mb-3 md:mb-0">
       @foreach ($menu as $item)
           <li class="menu-item relative mb-3 {!! $item['classes'] !!}">
               <a target="{{ $item['target'] }}" href="{{ $item['url'] }}"
                   class="text-white block">{{ $item['title'] }}</a>
           </li>
       @endforeach
   </ul>
