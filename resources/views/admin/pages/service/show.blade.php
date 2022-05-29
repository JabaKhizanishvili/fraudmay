{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $service->title)



@section('content')
    <!-- users view start -->
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m7">
                <div class="display-flex media">
                    <div class="media-body">
                        <h6 class="media-heading">
                            <span class="users-view-name">{{$service->title}} </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                <a href="{{locale_route('service.edit',$service->id)}}" class="btn-small indigo">
                    @lang('admin.edit')
                </a>
{{--                <a class="btn-small -settings waves-effect -light -btn right ml-3"--}}
{{--                   href="{{locale_route('service.destroy',$service->id)}}"--}}
{{--                   onclick="return confirm('Are you sure?')">--}}
{{--                    <span class="hide-on-small-onl">--}}
{{--                        @lang('admin.delete')--}}
{{--                    </span>--}}
{{--                </a>--}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s12 m4">
                    <table class="striped">
                        <tbody>
                        <tr>
                            <td>@lang('admin.status'):</td>
                            <td>
                                @if($service->status)
                                    <span class="chip green lighten-5 green-text">@lang('admin.active')</span>
                                @else
                                    <span class="chip red lighten-5 red-text">@lang('admin.not_active')</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.created_at')</td>
                            <td>{{\Carbon\Carbon::parse($service->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.updated_at')</td>
                            <td>{{\Carbon\Carbon::parse($service->updated_at)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col s12">
                    <ul class="tabs">
                        @foreach(config('translatable.locales') as $locale)
                            <li class="tab">
                                <a href="#cat-{{$locale}}">
                                    {{$locale}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col sm12 mt-2">
                    @foreach(config('translatable.locales') as $locale)
                            <div id="cat-{{$locale}}"
                                 class="">
                                <table class="striped">
                                    <tbody>
                                    <tr>
                                        <td>@lang('admin.meta_title'):</td>
                                        <td>{{$service->translate($locale)->meta_title ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.meta_description'):</td>
                                        <td>{{$service->translate($locale)->meta_description ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.meta_keyword'):</td>
                                        <td>{{$service->translate($locale)->meta_keyword ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.title'):</td>
                                        <td>{{$service->translate($locale)->title ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.subtitle_1'):</td>
                                        <td>{{$service->translate($locale)->subtitle_1 ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.subtitle_2'):</td>
                                        <td>{{$service->translate($locale)->subtitle_2 ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.content_1'):</td>
                                        <td>{{$service->translate($locale)->content_1 ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.content_2'):</td>
                                        <td>{{$service->translate($locale)->content_2 ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.description'):</td>
                                        <td>{{$service->translate($locale)->description ?? ''}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section">
            <div class="masonry-gallery-wrapper">
                <div class="popup-gallery">
                    <div class="gallery-sizer"></div>
                    <div class="row">
                        @if($service->mainFile_1)
                            <div class="col s12 m6 l4 xl2">
                                <div>
                                    <a href="{{asset($service->mainFile_1->path.'/'.$service->mainFile_1->title)}}" target="_blank"
                                       title="$file->title">
                                        <img src="{{asset($service->mainFile_1->path.'/'.$service->mainFile_1->title)}}" class="responsive-img mb-10"
                                             alt="">
                                    </a>
                                </div>
                            </div>
                        @endif
                            @if($service->mainFile_2)
                                <div class="col s12 m6 l4 xl2">
                                    <div>
                                        <a href="{{asset($service->mainFile_2->path.'/'.$service->mainFile_2->title)}}" target="_blank"
                                           title="$file->title">
                                            <img src="{{asset($service->mainFile_2->path.'/'.$service->mainFile_2->title)}}" class="responsive-img mb-10"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @foreach($service->files as $file)
                            <div class="col s12 m6 l4 xl2">
                                <div>
                                    <a href="{{asset($file->path.'/'.$file->title)}}" target="_blank"
                                       title="$file->title">
                                        <img src="{{asset($file->path.'/'.$file->title)}}" class="responsive-img mb-10"
                                             alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


