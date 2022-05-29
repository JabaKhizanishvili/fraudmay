{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title','Language - ' .$language->title)


@section('content')
    <!-- users view start -->
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m7">
                <div class="display-flex media">
                    <div class="media-body">
                        <h6 class="media-heading">
                            <span class="users-view-name">{{$language->title}} </span>
                        </h6>
                    </div>
                </div>
            </div>
            @if(!$language->default)
                <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                    <a href="{{locale_route('language.edit',$language->id)}}" class="btn-small indigo">
                        @lang('admin.edit')
                    </a>
                    <a class="btn-small -settings waves-effect -light -btn right ml-3"
                       href="{{locale_route('language.destroy',$language->id)}}"
                       onclick="return confirm('Are you sure?')">
                    <span class="hide-on-small-onl">
                        @lang('admin.delete')
                    </span>
                    </a>
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s12 m4">
                    <table class="striped">
                        <tbody>
                        <tr>
                            <td>@lang('admin.title'):</td>
                            <td>{{$language->title}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.locale'):</td>
                            <td>{{$language->locale}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.default'):</td>
                            <td>
                                {{$language->default ? __('admin.yes') : __('admin.no')}}
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                @if($language->status)
                                    <span class="chip green lighten-5 green-text">Active</span>
                                @else
                                    <span class="chip red lighten-5 red-text">Not Active</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.created_at')</td>
                            <td>{{\Carbon\Carbon::parse($language->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.updated_at')</td>
                            <td>{{\Carbon\Carbon::parse($language->updated_at)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- users view card data ends -->
    @if(count($language->files)>0)
        <div class="section">
            <div class="section">
                <div class="masonry-gallery-wrapper">
                    <div class="popup-gallery">
                        <div class="gallery-sizer"></div>
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    @foreach($language->files as $file)
                                        <div class="col s12 m6 l4 xl2">
                                            <div>
                                                <a href="{{asset($file->path.'/'.$file->title)}}" target="_blank"
                                                   title="$file->title">
                                                    @if($file->format=='jpg'||$file->format=='png' || $file->format=='svg')
                                                        <img src="{{asset($file->path.'/'.$file->title)}}"
                                                             class="responsive-img mb-10"
                                                             alt="">
                                                    @else
                                                        <p>{{$file->title}}</p>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- users view ends -->
@endsection


