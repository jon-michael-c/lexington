 <select>
     @if (isset($options) && !empty($options))
         @foreach ($options as $option)
             <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
         @endforeach
     @endif
 </select>
