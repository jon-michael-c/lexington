<div class="folds">
    @if (isset($items))
        @foreach ($items as $item)
            @if (isset($item['title']) && isset($item['content']))
                <div class="folds-item cursor-pointer">
                    <div class="folds-title">
                        <p class="font-semibold text-magenta">{!! $item['title'] !!}</p>
                    </div>
                    <div class="folds-content text-charcoal">
                        {!! $item['content'] !!}
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const foldsItems = document.querySelectorAll('.folds-item');
        foldsItems.forEach((item) => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });
    });
</script>
