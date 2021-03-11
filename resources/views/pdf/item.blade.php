<div class="page">
    <div class="title">
        {{ $item['title'] }}
    </div>
    <div class="image">
        <img src="{{ $item['image'] }}">
    </div>
    <div class="link">
        <a href="{{ $item['link'] }}">
            Click to Read More
        </a>
    </div>
</div>
@if(!$last_page)
    <div class="page-break"></div>
@endif
