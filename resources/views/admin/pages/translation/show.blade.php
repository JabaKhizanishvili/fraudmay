{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title', $translation->group. ' - ' .$translation->key)



@section('content')
    <!-- users view start -->
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m7">
                <div class="display-flex media">
                    <div class="media-body">
                        <h6 class="media-heading">
                            <span class="users-view-name">{{$translation->key}} </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                <a href="{{locale_route('translation.edit',$translation->id)}}" class="btn-small indigo">
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
                            <td>@lang('admin.group'):</td>
                            <td>{{$translation->group}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.key'):</td>
                            <td>{{$translation->key}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.created_at')</td>
                            <td>{{\Carbon\Carbon::parse($translation->created_at)}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.updated_at')</td>
                            <td>{{\Carbon\Carbon::parse($translation->updated_at)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col s12">
                    <ul class="tabs">
                        @foreach($translation->text as $key => $text)
                            @if(isset($languages[$key]))
                                <li class="tab ">
                                    <a href="#trans-{{$translation->id}}-{{$key}}">{{$languages[$key]->locale}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col s12 mt-2">
                    @foreach($translation->text as $key => $text)
                        @if(isset($languages[$key]))
                            <div id="trans-{{$translation->id}}-{{$key}}" class="">
                                {{$text}}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- users view card data ends -->



    </div>
    <!-- users view ends -->
@endsection


