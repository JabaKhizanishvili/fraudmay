{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title','Language')


@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="button-trigger" class="card card card-default scrollspy">

                <div class="card-content">
                    <a class="btn-floating btn-large primary-text gradient-shadow compose-email-trigger "
                       href="{{locale_route('language.create')}}">
                        <i class="material-icons">add</i>
                    </a>
                    <h4 class="card-title mt-2">Languages</h4>
                    <div class="row">

                        <div class="col s12">
                            <form class="mr-0 p-0" id="language-search-form">

                                <table id="data-table-simple" class="display">
                                    <thead>
                                    <tr>
                                        <th>@lang('admin.id')</th>
                                        <th>@lang('admin.title')</th>
                                        <th>@lang('admin.locale')</th>
                                        <th>@lang('admin.status')</th>
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
                                            <input type="text" name="locale" onchange="this.form.submit()"
                                                   value="{{Request::get('locale')}}"
                                                   class="validate {{$errors->has('locale') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <select class="form-control" name="status" onchange="this.form.submit()">
                                                <option
                                                    value="" {{Request::get('status') === '' ? 'selected' :''}}>@lang('admin.any')</option>
                                                <option
                                                    value="1" {{Request::get('status') === '1' ? 'selected' :''}}>@lang('admin.active')</option>
                                                <option
                                                    value="0" {{Request::get('status') === '0' ? 'selected' :''}}>@lang('admin.not_active')</option>
                                            </select>
                                        </th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                    @if($languages)
                                        @foreach($languages as $language)
                                            <tr>
                                                <td>{{$language->id}}</td>
                                                <td>{{$language->title}}</td>
                                                <td>{{$language->locale}}</td>
                                                <td>
                                                    @if($language->status)
                                                        <span class="green-text">Active</span>
                                                    @else
                                                        <span class="red-text">Not active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{locale_route('language.show',$language->id)}}">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>


                                                    <a href="{{locale_route('language.edit',$language->id)}}"
                                                       class="pl-3">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    @if(!$language->default)
                                                        <a href="{{locale_route('language.destroy',$language->id)}}"
                                                           onclick="return confirm('Are you sure?')" class="pl-3">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </form>
                            {{ $languages->appends(request()->input())->links('admin.vendor.pagination.material') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


