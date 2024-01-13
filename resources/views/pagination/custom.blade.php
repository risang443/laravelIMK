@if ($paginator->hasPages())
<div class="flex flex-row gap-x-3 justify-items-center justify-between bg-primary rounded-full py-2 px-3 shadow-md w-full border border-primary/60">
    <div class="flex items-center">
        @if ($paginator->onFirstPage())
            <div class=""><span class="text-white/40"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
              </svg></span></div>
        @else
            <div class=""><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
              </svg></a></div>
        @endif
    </div>
    <div class="flex flex-row gap-x-3 items-center">
        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="disabled"><span>{{ $element }}</span></div>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="text-primary rounded-full bg-detail px-2 text-center"><span class="font-bold">{{ $page }}</span></div>
                    @else
                        <div class="text-white font-bold text-lg text-center"><a href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
    <div class="flex items-center">
        @if ($paginator->hasMorePages())
            <div><a href="{{ $paginator->nextPageUrl() }}" class="text-white" rel="next"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg></a></div>
        @else
            <div class="text-white/40"><span><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg></span></div>
        @endif
    </div>
</div>
@endif 