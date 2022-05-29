{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $project->id? __('admin.project-update') : 'admin.project-create')

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
                    <input name="old-images[]" id="old_images" hidden disabled value="{{$project->files}}">
                    <h4 class="card-title">{{$project->id ? __('admin.project-update') : __('admin.project-create')}}</h4>
                    {!! Form::model($project,['url' => $url, 'method' => $method,'files' => true]) !!}
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
                                            {!! Form::text($locale.'[title]',$project->translate($locale)->title ?? '',['class' => 'validate '. $errors->has($locale.'.title') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[description]',$project->translate($locale)->description ?? '',['class' => 'validate '. $errors->has($locale.'.description') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[description]',__('admin.description')) !!}
                                            @error($locale.'.description')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="input-field ">
                                            {!! Form::text($locale.'[meta_title]',$project->translate($locale)->meta_title ?? '',['class' => 'validate '. $errors->has($locale.'.meta_title') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[meta_description]',$project->translate($locale)->meta_description ?? '',['class' => 'validate '. $errors->has($locale.'.meta_description') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[meta_keyword]',$project->translate($locale)->meta_keyword ?? '',['class' => 'validate '. $errors->has($locale.'.meta_keyword') ? '' : 'valid']) !!}
                                            {!! Form::label($locale.'[meta_keyword]',__('admin.meta_keyword')) !!}
                                            @error($locale.'.meta_keyword')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>


                                        <div class="input-field">
                                            <h5 for="content">@lang('admin.content')</h5>
                                            {!! Form::textarea($locale.'[content]',$project->translate($locale)->content ?? '',['class' => 'form-control validate '. ($errors->has($locale.'.content') ? '' : 'valid'),'id'=>'content-'.$locale]) !!}
                                            @error($locale.'.content')
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
                                    {!! Form::text('slug',$project->slug,['class' => 'validate '. $errors->has('slug') ? '' : 'valid']) !!}
                                    {!! Form::label('slug',__('admin.slug')) !!}
                                    @error('slug')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">

                                    <select name="type" class="select2 js-example-programmatic browser-default">
                                        <option
                                            {{$project->type=='current'?"selected":""}} value="current">@lang('client.current')</option>
                                        <option
                                            {{$project->type=='finished'?"selected":""}} value="finished">@lang('client.finished')</option>
                                    </select>

                                    <label class="active" for="category_id">{{__('admin.type')}}</label>

                                    @error('type')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field"></div>
                                <div class="col s12 mt-3 mb-3">
                                    <label>
                                        <input type="checkbox" name="status"
                                               value="true" {{$project->status ? 'checked' : ''}}>
                                        <span>{{__('admin.status')}}</span>
                                    </label>
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
                            {!! Form::submit($project->created_at ? __('admin.update') : __('admin.create'),['class' => 'btn cyan waves-effect waves-light ']) !!}
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
        CKEDITOR.replace('content-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token(),'type'=>'project'])}}",
            filebrowserUploadMethod: 'form'
        });
        @endforeach
    </script>
@endsection
