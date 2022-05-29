{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $floor->content)



@section('content')
    <!-- users view start -->
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m7">
                <div class="display-flex media">
                    <div class="media-body">
                        <h6 class="media-heading">
                            <span class="users-view-name">{{$floor->content}} </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                <a href="{{locale_route('floor.edit',$floor->id)}}" class="btn-small indigo">
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
                            <td>@lang('admin.apartment'):</td>
                            <td>
                                <a href="{{locale_route('apartment.show',$floor->apartment_id)}}">
                                    {{$floor->apartment_relation->title}}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.slug'):</td>
                            <td>
                                {{$floor->slug}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.status'):</td>
                            <td>
                                @if($floor->status)
                                    <span class="chip green lighten-5 green-text">@lang('admin.active')</span>
                                @else
                                    <span class="chip red lighten-5 red-text">@lang('admin.not_active')</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.created_at')</td>
                            <td>{{\Carbon\Carbon::parse($floor->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.updated_at')</td>
                            <td>{{\Carbon\Carbon::parse($floor->updated_at)}}</td>
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
                                        <td>@lang('admin.title'):</td>
                                        <td>{{$floor->translate($locale)->title ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.dimension'):</td>
                                        <td>{{$floor->translate($locale)->dimension ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.apartment'):</td>
                                        <td>{{$floor->translate($locale)->apartment ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.area'):</td>
                                        <td>{{$floor->translate($locale)->area ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.specifications'):</td>
                                        <td>{!! $floor->translate($locale)->specifications ?? '' !!}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.meta_title'):</td>
                                        <td>{{$floor->translate($locale)->meta_title ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.meta_description'):</td>
                                        <td>{{$floor->translate($locale)->meta_description ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('admin.meta_keyword'):</td>
                                        <td>{{$floor->translate($locale)->meta_keyword ?? ''}}</td>
                                    </tr>
                                </table>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection


