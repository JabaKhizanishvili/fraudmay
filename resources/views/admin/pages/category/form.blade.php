{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $category->created_at ? __('admin.category-update') : 'admin.category-create')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">
@endsection
{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m6 l6">
            <div id="basic-form" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{$category->created_at ? __('admin.category-update') : __('admin.category-create')}}</h4>
                    {!! Form::model($category,['url' => $url, 'method' => $method,'files' => true]) !!}
                    <div class="row">
                        <ul class="tabs">
                            @foreach(config('translatable.locales') as $locale)
                                <li class="tab col ">
                                    <a href="#lang-{{$locale}}">{{$locale}}</a>
                                </li>
                            @endforeach
                        </ul>
                        @foreach(config('translatable.locales') as $locale)
                            <div id="lang-{{$locale}}" class="col s12  mt-5">
                                <div class="input-field">
                                    {!! Form::text($locale.'[title]',$category->translate($locale)->title ?? '',['class' => 'validate '. $errors->has($locale.'[title]') ? '' : 'valid']) !!}
                                    {!! Form::label($locale.'[title]',__('admin.title')) !!}
                                    @error($locale.'.title')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                        <div class="col s12 mt-2">
                            <label>
                                <input type="checkbox" name="status"
                                       value="true" {{$category->status ? 'checked' : ''}}>
                                <span>@lang('admin.status')</span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::submit($category->created_at ? __('admin.update') : __('admin.create'),['class' => 'btn cyan waves-effect waves-light right']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- vendor script --}}
@section('vendor-script')
    <script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('vendors/dropify/js/dropify.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
    <script src="{{asset('js/scripts/form-select2.js')}}"></script>
    <script src="{{asset('js/scripts/form-file-uploads.js')}}"></script>
@endsection