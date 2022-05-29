@if($paginator->hasPages())
    <div class="pagination-container" style="text-align-last: end">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <a href="" onclick="return false;">
                        <i class="mdi-navigation-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="">
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="mdi-navigation-chevron-left"></i>
                    </a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="" onclick="return false;">{{$page}}</a></li>

                            <li>
                        @else
                            <li class="waves-effect"><a href="{{$url}}">{{$page}}</a></li>

                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="waves-effect">
                    <a href="{{$paginator->nextPageUrl() }}}}">
                        <i class="mdi-navigation-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="waves-effect">
                    <a href="" onclick="return false;">
                        <i class="mdi-navigation-chevron-right"></i>
                    </a>
                </li>

            @endif
        </ul>
    </div>
@else
    <div class="pagination-container" style="text-align-last: end">

        <ul class="pagination">
            <li class="disabled"><a href="" onclick="return false;"><i class="mdi-navigation-chevron-left"></i></a></li>
            <li class="active"><a href="" onclick="return false;">1</a></li>
            <li class="disabled"><a href="" onclick="return false;"><i class="mdi-navigation-chevron-right"></i></a>
            </li>
        </ul>
    </div>
@endif