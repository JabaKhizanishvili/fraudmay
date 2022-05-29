{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $user->profile->name)



@section('content')
    <!-- users view start -->
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m7">
                <div class="display-flex media">
                    <div class="media-body">
                        <h6 class="media-heading">
                            <span class="users-view-name">{{$user->profile->name}} </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                <a href="{{locale_route('moderator.edit',$user->id)}}" class="btn-small indigo">
                    @lang('admin.edit')
                </a>
                <a class="btn-small -settings waves-effect -light -btn right ml-3"
                   href="{{locale_route('moderator.destroy',$user->id)}}"
                   onclick="return confirm('Are you sure?')">
                    <span class="hide-on-small-onl">
                        @lang('admin.delete')
                    </span>
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
                            <td>@lang('admin.name'):</td>
                            <td>
                                {{$user->profile->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.surname')</td>
                            <td>{{$user->profile->surname}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.phone')</td>
                            <td>{{$user->profile->phone}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.email')</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @if(count($user->files)>0)
        <div class="section">
            <div class="section">
                <div class="masonry-gallery-wrapper">
                    <div class="popup-gallery">
                        <div class="gallery-sizer"></div>
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    @foreach($user->files as $file)
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
@endsection


