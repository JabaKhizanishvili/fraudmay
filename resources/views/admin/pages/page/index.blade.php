{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title',__('admin.page'))


@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="button-trigger" class="card card card-default scrollspy">

                <div class="card-content">
                    <h4 class="card-title mt-2">@lang('admin.page')</h4>
                    <div class="row">
                        <div class="col s12">
                            <form class="mr-0 p-0">
                                <table id="data-table-simple" class="display">
                                    <thead>
                                    <tr>
                                        <th>@lang('admin.id')</th>
                                        <th>@lang('admin.key')</th>
                                        <th>@lang('admin.title_1')</th>
                                        <th>@lang('admin.title_2')</th>
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
                                            <input type="text" name="title_1" onchange="this.form.submit()"
                                                   value="{{Request::get('title_1')}}"
                                                   class="validate {{$errors->has('title_1') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="title_2" onchange="this.form.submit()"
                                                   value="{{Request::get('title_2')}}"
                                                   class="validate {{$errors->has('title_2') ? '' : 'valid'}}">
                                        </th>
                                    </tr>
                                    <tbody>
                                    @if($pages)
                                        @foreach($pages as $page)
                                            <tr>
                                                <td>{{$page->id}}</td>
                                                <td>{{$page->key}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <ul class="tabs">
                                                                @foreach(config('translatable.locales') as $locale)
                                                                    <li class="tab ">
                                                                        <a href="#cat-{{$locale}}-{{$page->id}}">
                                                                            {{$locale}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col sm12 mt-2">
                                                            @foreach(config('translatable.locales') as $locale)
                                                                <div id="cat-{{$locale}}-{{$page->id}}"
                                                                     class="">
                                                                    {{$page->translate($locale)->title_1 ?? ''}}
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
                                                                        <a href="#cat1-{{$locale}}-{{$page->id}}">
                                                                            {{$locale}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="col sm12 mt-2">
                                                            @foreach(config('translatable.locales') as $locale)
                                                                <div id="cat1-{{$locale}}-{{$page->id}}"
                                                                     class="">
                                                                    {{$page->translate($locale)->title_2 ?? ''}}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{locale_route('page.show',$page->id)}}">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                    <a href="{{locale_route('page.edit',$page->id)}}"
                                                       class="pl-3">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    {{--                                                    <a href="{{locale_route('page.destroy',$page->id)}}"--}}
                                                    {{--                                                       onclick="return confirm('Are you sure?')" class="pl-3">--}}
                                                    {{--                                                        <i class="material-icons">delete</i>--}}
                                                    {{--                                                    </a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </form>
                            {{ $pages->appends(request()->input())->links('admin.vendor.pagination.material') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


