{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', __('admin.page-update'))

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection
{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/form-select2.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 12">
            <div id="basic-form" class="card card card-default scrollspy">
                <div class="card-content">
                    <input name="old-images[]" id="old_images" hidden disabled value="{{$page->files}}">
                    <h4 class="card-title">{{ __('admin.page-update') }}</h4>
                    {!! Form::model($page,['url' => $url, 'method' => $method,'files' => true]) !!}
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
                                            {!! Form::text($locale.'[title_1]',$page->translate($locale)->title_1 ?? '',['class' => 'validate '. $errors->has($locale.'.title_1') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[title_1]',__('admin.title_1')) !!}
                                            @error($locale.'.title_1')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="input-field ">
                                            {!! Form::text($locale.'[title_2]',$page->translate($locale)->title_2 ?? '',['class' => 'validate '. $errors->has($locale.'.title_2') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[title_2]',__('admin.title_2')) !!}
                                            @error($locale.'.title_2')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <h5 for="description">@lang('admin.content_1')</h5>
                                            {!! Form::textarea($locale.'[content_1]', $page->translate($locale)->content_1 ?? '',['class' => 'form-control validate '. ($errors->has($locale.'.content_1') ? '' : 'valid'),'id'=>"content_1-".$locale]) !!}
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
                                            {!! Form::textarea($locale.'[content_2]', $page->translate($locale)->content_2 ?? '',['class' => 'form-control validate '. ($errors->has($locale.'.content_2') ? '' : 'valid'),'id'=>"content_2-".$locale]) !!}
                                            @error($locale.'.content_2')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="input-field ">
                                            {!! Form::text($locale.'[meta_title]',$page->translate($locale)->meta_title ?? '',['class' => 'validate '. $errors->has($locale.'.meta_title') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[meta_description]',$page->translate($locale)->meta_description ?? '',['class' => 'validate '. $errors->has($locale.'.meta_description') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[meta_keyword]',$page->translate($locale)->meta_keyword ?? '',['class' => 'validate '. $errors->has($locale.'.meta_keyword') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[meta_keyword]',__('admin.meta_keyword')) !!}
                                            @error($locale.'.meta_keyword')
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
                                <div class="input-field col s12">
                                    <label for="youtube_link">{{__('admin.video_link')}}</label>

                                    {!! Form::text('video_link',$page->video_link ?? '',['class' => 'validate '. $errors->has('video_link') ? '' : 'valid']) !!}
                                    @error('video_link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                            </div>
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
                            {!! Form::submit(__('admin.update'),['class' => 'btn cyan waves-effect waves-light ']) !!}
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
@endsection

{{-- page script --}}
@section('page-script')
    <script src="{{asset('js/scripts/form-select2.js')}}"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        @foreach(config('translatable.locales') as $locale)
        CKEDITOR.replace('content_1-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token(),'type'=>'page'])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('content_2-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token(),'type'=>'page'])}}",
            filebrowserUploadMethod: 'form'
        });
        @endforeach
    </script>
@endsection
