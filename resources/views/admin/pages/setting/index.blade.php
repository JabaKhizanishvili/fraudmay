{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title',__('admin.setting'))


@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="button-trigger" class="card card card-default scrollspy">

                <div class="card-content">
                    <h4 class="card-title mt-2">@lang('admin.setting')</h4>
                    <div class="row">
                        <div class="col s12">
                            <form class="mr-0 p-0">
                                <table id="data-table-simple" class="display">
                                    <thead>
                                    <tr>
                                        <th>@lang('admin.id')</th>
                                        <th>@lang('admin.key')</th>
                                        <th>@lang('admin.value')</th>
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
                                            <input type="text" name="key" onchange="this.form.submit()"
                                                   value="{{Request::get('key')}}"
                                                   class="validate {{$errors->has('key') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="value" onchange="this.form.submit()"
                                                   value="{{Request::get('value')}}"
                                                   class="validate {{$errors->has('value') ? '' : 'valid'}}">
                                        </th>
                                    </tr>
                                    <tbody>
                                    @if($settings)
                                        @foreach($settings as $setting)
                                            <tr>
                                                <td>{{$setting->id}}</td>
                                                <td>{{$setting->key}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <ul class="tabs">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="tab ">
                                                                        <a href="#cat-{{$locale["locale"]}}-{{$setting->id}}">
                                                                            {{$locale["locale"]}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col sm12 mt-2">
                                                            @foreach(config('translatable.locales') as $locale)
                                                                <div id="cat-{{$locale["locale"]}}-{{$setting->id}}"
                                                                     class="">
                                                                    {{$setting->translate($locale["locale"])->value ?? ''}}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{locale_route('setting.show',$setting->id)}}">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                    <a href="{{locale_route('setting.edit',$setting->id)}}"
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
                            {{ $settings->appends(request()->input())->links('admin.vendor.pagination.material') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


