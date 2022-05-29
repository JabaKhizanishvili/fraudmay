{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title',__('admin.apartment'))


@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="button-trigger" class="card card card-default scrollspy">

                <div class="card-content">
                    <h4 class="card-title mt-2">@lang('admin.apartment')</h4>
                    <div class="row">
                        <div class="col s12">
                            <form class="mr-0 p-0">
                                <table id="data-table-simple" class="display">
                                    <thead>
                                    <tr>
                                        <th>@lang('admin.id')</th>
                                        <th>@lang('admin.title')</th>
                                        <th>@lang('admin.floor')</th>
                                        <th>@lang('admin.apartments')</th>
                                        <th>@lang('admin.actions')</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <th>
                                            <input type="number" name="id" onchange="this.form.submit()"
                                                   value="{{Request::get('id')}}"
                                                   class="validate {{$errors->has('id') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="title" onchange="this.form.submit()"
                                                   value="{{Request::get('title')}}"
                                                   class="validate {{$errors->has('title') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="floor" onchange="this.form.submit()"
                                                   value="{{Request::get('floor')}}"
                                                   class="validate {{$errors->has('floor') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="apartments" onchange="this.form.submit()"
                                                   value="{{Request::get('apartments')}}"
                                                   class="validate {{$errors->has('apartments') ? '' : 'valid'}}">
                                        </th>
                                    </tr>
                                    <tbody>
                                    @if($apartments)
                                        @foreach($apartments as $apartment)
                                            <tr>
                                                <td>{{$apartment->id}}</td>
                                                <td>{{$apartment->title}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <ul class="tabs">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="tab ">
                                                                        <a href="#cat-{{$locale}}-{{$apartment->id}}">
                                                                            {{$locale}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col sm12 mt-2">
                                                            @foreach(config('translatable.locales') as $locale)
                                                                <div id="cat-{{$locale}}-{{$apartment->id}}"
                                                                     class="">
                                                                    {{$apartment->translate($locale)->floor ?? ''}}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <ul class="tabs">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="tab ">
                                                                        <a href="#apartments-{{$locale}}-{{$apartment->id}}">
                                                                            {{$locale}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col sm12 mt-2">
                                                            @foreach(config('translatable.locales') as $locale)
                                                                <div id="apartments-{{$locale}}-{{$apartment->id}}"
                                                                     class="">
                                                                    {{$apartment->translate($locale)->apartments ?? ''}}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{locale_route('apartment.show',$apartment->id)}}">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                    <a href="{{locale_route('apartment.edit',$apartment->id)}}"
                                                       class="pl-3">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </form>
                            {{ $apartments->appends(request()->input())->links('admin.vendor.pagination.material') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


