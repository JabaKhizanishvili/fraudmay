<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>@yield('title') </span></h5>
                <ol class="breadcrumbs mb-0">
                    @foreach (request()->breadcrumbs()->segments() as $key => $segment)
                        @if($key>0)
                            @if(!isset(request()->breadcrumbs()->segments()[$key+1]))
                                <li class="breadcrumb-item">
                                    <a href="" onclick="return false;">{{is_numeric($segment->name()) ? $segment->name() : __('admin.'.$segment->name()) }}</a>
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{$segment->url()}}">{{is_numeric($segment->name()) ? $segment->name() : __('admin.'.$segment->name()) }}</a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
