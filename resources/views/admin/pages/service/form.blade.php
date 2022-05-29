{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $service->category_id ? __('admin.service-update') : 'admin.service-create')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection
{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/dropify/css/dropify.min.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 12">
            <div id="basic-form" class="card card card-default scrollspy">
                <div class="card-content">
                    <input name="old-images[]" id="old_images" hidden disabled value="{{$service->files}}">
                    <h4 class="card-title">{{$service->category_id ? __('admin.service-update') : __('admin.service-create')}}</h4>
                    {!! Form::model($service,['url' => $url, 'method' => $method,'files' => true]) !!}
{{--                    <input name="old_main_image" id="old-main" hidden value="{{$service->mainFile}}">--}}
{{--                    <input name="old-images[]" id="old_images" hidden disabled value="{{$service->files}}">--}}

                    {!! Form::text('old_main_image_1',$service->mainFile_1,['hidden','id'=>'old-main-1']) !!}
                    {!! Form::text('old_main_image_2',$service->mainFile_2,['hidden','id'=>'old-main-2']) !!}
                    <div class="row">
                        <div class="col s12 m6 8">
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
                                        <div class="input-field ">
                                            {!! Form::text($locale.'[meta_title]',$service->translate($locale)->meta_title ?? '',['class' => 'validate '. $errors->has($locale.'.meta_title') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[meta_title]',__('admin.meta_title')) !!}
                                            @error($locale.'.meta_title')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="input-field ">
                                            {!! Form::text($locale.'[meta_description]',$service->translate($locale)->meta_description ?? '',['class' => 'validate '. $errors->has($locale.'.meta_description') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[meta_description]',__('admin.meta_description')) !!}
                                            @error($locale.'.meta_description')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="input-field ">
                                            {!! Form::text($locale.'[meta_keyword]',$service->translate($locale)->meta_keyword ?? '',['class' => 'validate '. $errors->has($locale.'.meta_keyword') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[meta_keyword]',__('admin.meta_keyword')) !!}
                                            @error($locale.'.meta_keyword')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="input-field ">
                                            {!! Form::text($locale.'[title]',$service->translate($locale)->title ?? '',['class' => 'validate '. $errors->has($locale.'.title') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[title]',__('admin.title')) !!}
                                            @error($locale.'.title')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="input-field ">
                                            {!! Form::text($locale.'[subtitle_1]',$service->translate($locale)->subtitle_1 ?? '',['class' => 'validate '. $errors->has($locale.'.subtitle_1') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[subtitle_1]',__('admin.subtitle_1')) !!}
                                            @error($locale.'.subtitle_1')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="input-field ">
                                            {!! Form::text($locale.'[subtitle_2]',$service->translate($locale)->subtitle_2 ?? '',['class' => 'validate '. $errors->has($locale.'.subtitle_2') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[subtitle_2]',__('admin.subtitle_2')) !!}
                                            @error($locale.'.subtitle_2')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <h5 for="description">@lang('admin.content_1')</h5>
                                            <textarea class="form-control" id="content_1-{{$locale}}"
                                                      name="{{$locale}}[content_1]'">
                                                {!! $service->translate($locale)->content_1 ?? '' !!}
                                            </textarea>
                                            @error($locale.'.content_1')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <h5 for="description">@lang('admin.content_2')</h5>
                                            <textarea class="form-control" id="content_2-{{$locale}}"
                                                      name="{{$locale}}[content_2]'">
                                                {!! $service->translate($locale)->content_2 ?? '' !!}
                                            </textarea>
                                            @error($locale.'.content_2')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>



                                        <div class="input-field">
                                            <h5 for="description">@lang('admin.description')</h5>
                                            <textarea class="form-control" id="description-{{$locale}}"
                                                      name="{{$locale}}[description]'">
                                                {!! $service->translate($locale)->description ?? '' !!}
                                            </textarea>
                                            @error($locale.'.description')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col s12 m6 8">
                            <div class="row">
                                <div class="input-field"></div>
                                <div class="col s12 mt-3 mb-3">
                                    <label>
                                        <input type="checkbox" name="status"
                                               value="true" {{$service->status ? 'checked' : ''}}>
                                        <span>{{__('admin.status')}}</span>
                                    </label>
                                </div>
                            </div>
                            <label>{{__('client.main_image_1')}}</label>
                            <div class="form-group">
                                <input name="main-image-1" type="file" id="input-file-now-1" class="dropify dropify-1"
                                       data-default-file="{{$service->mainFile_1?asset($service->mainFile_1->path.'/'.$service->mainFile_1->title):""}}"/>
                                @if ($errors->has('main-image-1'))
                                    <span class="help-block">
                                            {{ $errors->first('main-image-1') }}
                                        </span>
                                @endif
                            </div>
                            <br>
                            <label>{{__('client.main_image_2')}}</label>
                            <div class="form-group">
                                <input name="main-image-2" type="file" id="input-file-now-2" class="dropify dropify-2"
                                       data-default-file="{{$service->mainFile_2?asset($service->mainFile_2->path.'/'.$service->mainFile_2->title):""}}"/>
                                @if ($errors->has('main-image-2'))
                                    <span class="help-block">
                                            {{ $errors->first('main-image-2') }}
                                        </span>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="input-images"></div>
                                @if ($errors->has('images'))
                                    <span class="help-block">
                                            {{ $errors->first('images') }}
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::submit($service->created_at ? __('admin.update') : __('admin.create'),['class' => 'btn cyan waves-effect waves-light ']) !!}
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
    <script src="{{asset('js/scripts/form-file-uploads.js?v='.time())}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        @foreach(config('translatable.locales') as $locale)
        CKEDITOR.replace('description-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('content_1-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('content_2-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        @endforeach
    </script>
@endsection
