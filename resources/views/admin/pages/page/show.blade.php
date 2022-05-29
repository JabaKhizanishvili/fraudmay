{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $page->title)



@section('content')
    <!-- users view start -->
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m7">
                <div class="display-flex media">
                    <div class="media-body">
                        <h6 class="media-heading">
                            <span class="users-view-name">{{$page->title}} </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                <a href="{{locale_route('page.edit',$page->id)}}" class="btn-small indigo">
                    @lang('admin.edit')
                </a>
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
                            <td>@lang('admin.key'):</td>
                            <td>
                                {{$page->key}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.video_link'):</td>
                            <td>
                                {{$page->video_link}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.created_at')</td>
                            <td>{{\Carbon\Carbon::parse($page->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.updated_at')</td>
                            <td>{{\Carbon\Carbon::parse($page->updated_at)}}</td>
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
                                    <td>@lang('admin.title_1'):</td>
                                    <td>{{$page->translate($locale)->title_1 ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('admin.title_2'):</td>
                                    <td>{{$page->translate($locale)->title_2 ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('admin.content_1'):</td>
                                    <td>{!!$page->translate($locale)->content_1 ?? ''!!}</td>
                                </tr>
                                <tr>
                                    <td>@lang('admin.content_2'):</td>
                                    <td>{!!$page->translate($locale)->content_2 ?? ''!!}</td>
                                </tr>
                                <tr>
                                    <td>@lang('admin.meta_title'):</td>
                                    <td>{{$page->translate($locale)->meta_title ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('admin.meta_description'):</td>
                                    <td>{{$page->translate($locale)->meta_description ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('admin.meta_keyword'):</td>
                                    <td>{{$page->translate($locale)->meta_keyword ?? ''}}</td>
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
                        @foreach($page->files as $file)
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


