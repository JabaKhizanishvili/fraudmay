{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title','translation')


@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="button-trigger" class="card card card-default scrollspy">

                <div class="card-content">
                    <h4 class="card-title mt-2">@lang('admin.translations')</h4>
                    <div class="row">

                        <div class="col s12">
                            <form class="mr-0 p-0" id="translation-search-form">

                                <table id="data-table-simple" class="display">
                                    <thead>
                                    <tr>
                                        <th>@lang('admin.id')</th>
                                        <th>@lang('admin.group')</th>
                                        <th>@lang('admin.key')</th>
                                        <th>@lang('admin.text')</th>
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
                                            <input type="text" name="group" onchange="this.form.submit()"
                                                   value="{{Request::get('group')}}"
                                                   class="validate {{$errors->has('group') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="key" onchange="this.form.submit()"
                                                   value="{{Request::get('key')}}"
                                                   class="validate {{$errors->has('key') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="text" onchange="this.form.submit()"
                                                   value="{{Request::get('text')}}"
                                                   class="validate {{$errors->has('text') ? '' : 'valid'}}">
                                        </th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                    @if($translations)
                                        @foreach($translations as $translation)
                                            <tr>
                                                <td>{{$translation->id}}</td>
                                                <td>{{$translation->group}}</td>
                                                <td>{{$translation->key}}</td>
                                                <td>
                                                    <div class="row">
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
                                                        <div class="col sm12 mt-2">
                                                            @foreach($translation->text as $key => $text)
                                                                @if(isset($languages[$key]))
                                                                    <div id="trans-{{$translation->id}}-{{$key}}" class="">
                                                                        {{$text}}
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{locale_route('translation.show',$translation->id)}}">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                    <a href="{{locale_route('translation.edit',$translation->id)}}"
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
                            {{ $translations->appends(request()->input())->links('admin.vendor.pagination.material') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


