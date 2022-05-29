{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $company->id? __('admin.company-update') : 'admin.company-create')

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
                    <input name="old-images[]" id="old_images" hidden disabled value="{{$company->files}}">
                    <h4 class="card-title">{{$company->id ? __('admin.company-update') : __('admin.company-create')}}</h4>
                    {!! Form::model($company,['url' => $url, 'method' => $method,'files' => true]) !!}
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
                                            {!! Form::text($locale.'[title]',$company->translate($locale)->title ?? '',['class' => 'validate '. $errors->has($locale.'.title') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[description]',$company->translate($locale)->description ?? '',['class' => 'validate '. $errors->has($locale.'.description') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[meta_title]',$company->translate($locale)->meta_title ?? '',['class' => 'validate '. $errors->has($locale.'.meta_title') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[meta_description]',$company->translate($locale)->meta_description ?? '',['class' => 'validate '. $errors->has($locale.'.meta_description') ? '' : 'valid']) !!}
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
                                            {!! Form::text($locale.'[meta_keyword]',$company->translate($locale)->meta_keyword ?? '',['class' => 'validate '. $errors->has($locale.'.meta_keyword') ? '' : 'valid']) !!}
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
                                            <h5 for="content">@lang('admin.content_1')</h5>
                                            {!! Form::textarea($locale.'[content_1]',$company->translate($locale)->content_1 ?? '',['class' => 'ckeditor form-control validate '. ($errors->has($locale.'.content_1') ? '' : 'valid'),'id'=>'content-1-'.$locale]) !!}
                                            @error($locale.'.content_1')
                                            <small class="errorTxt4">
                                                <div class="error">
                                                    {{$message}}
                                                </div>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <h5 for="content">@lang('admin.content_2')</h5>
                                            {!! Form::textarea($locale.'[content_2]',$company->translate($locale)->content_2 ?? '',['class' => 'ckeditor form-control validate '. ($errors->has($locale.'.content_2') ? '' : 'valid'),'id'=>'content-2-'.$locale]) !!}
                                            @error($locale.'.content_2')
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
                                    {!! Form::text('slug',$company->slug,['class' => 'validate '. $errors->has('slug') ? '' : 'valid']) !!}
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
                                    <label for="website_link">{{__('admin.website_link')}}</label>

                                    {!! Form::text('website_link',$company->website_link ?? '',['class' => 'validate '. $errors->has('website_link') ? '' : 'valid']) !!}
                                    @error('website_link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    <label for="youtube_link">{{__('admin.youtube_link')}}</label>

                                    {!! Form::text('youtube_link',$company->youtube_link ?? '',['class' => 'validate '. $errors->has('youtube_link') ? '' : 'valid']) !!}
                                    @error('youtube_link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    <select class="select2 browser-default"
                                            multiple="multiple"
                                            id="select2-customize-result"
                                            name="projects[]">
                                        @foreach($projects as $project)
                                            <option
                                                {{isset($companyProjects) && in_array($project->id,$companyProjects)?"selected":""}} value="{{$project->id}}">
                                                {{$project->translate(app()->getLocale())->title ?? ''}}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label class="active" for="category_id">{{__('admin.projects')}}</label>

                                    @error('project[].*')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                {{--                                <div class="col">--}}
                                {{--                                    <label for="category_id">{{__('admin.category')}}</label>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="input-field col s12">--}}
                                {{--                                    <select name="category_id" class="select2 js-example-programmatic browser-default">--}}
                                {{--                                        <optgroup>--}}
                                {{--                                            @foreach($categories as $key => $category)--}}
                                {{--                                                 <option value="{{$category->id}}" {{$key === 0 ? 'selected' : ''}} {{$company->category_id === $category->id ? 'selected' : ''}}>--}}
                                {{--                                                    {{$category->title}}--}}
                                {{--                                                </option>--}}
                                {{--                                            @endforeach--}}
                                {{--                                        </optgroup>--}}
                                {{--                                    </select>--}}
                                {{--                                    @error('category_id')--}}
                                {{--                                    <small class="errorTxt4">--}}
                                {{--                                        <div class="error">--}}
                                {{--                                            {{$message}}--}}
                                {{--                                        </div>--}}
                                {{--                                    </small>--}}
                                {{--                                    @enderror--}}
                                {{--                                </div>--}}

                                <div class="input-field col s12">
                                    <label for="youtube_link">{{__('admin.youtube')}}</label>

                                    {!! Form::text('youtube',$company->youtube ?? '',['class' => 'validate '. $errors->has('youtube') ? '' : 'valid']) !!}
                                    @error('youtube')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    <label for="facebook_link">{{__('admin.facebook_link')}}</label>

                                    {!! Form::text('facebook_link',$company->facebook_link ?? '',['class' => 'validate '. $errors->has('facebook_link') ? '' : 'valid']) !!}
                                    @error('facebook_link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    <label for="linkedin_link">{{__('admin.linkedin_link')}}</label>

                                    {!! Form::text('linkedin_link',$company->linkedin_link ?? '',['class' => 'validate '. $errors->has('linkedin_link') ? '' : 'valid']) !!}
                                    @error('linkedin_link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    <label for="instagram_link">{{__('admin.instagram_link')}}</label>

                                    {!! Form::text('instagram_link',$company->instagram_link ?? '',['class' => 'validate '. $errors->has('instagram_link') ? '' : 'valid']) !!}
                                    @error('instagram_link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    <label for="twitter_link">{{__('admin.twitter_link')}}</label>

                                    {!! Form::text('twitter_link',$company->twitter_link ?? '',['class' => 'validate '. $errors->has('twitter_link') ? '' : 'valid']) !!}
                                    @error('twitter_link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    <label for="pinterest_link">{{__('admin.pinterest_link')}}</label>

                                    {!! Form::text('pinterest_link',$company->pinterest_link ?? '',['class' => 'validate '. $errors->has('pinterest_link') ? '' : 'valid']) !!}
                                    @error('pinterest_link')
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
                                               value="true" {{$company->status ? 'checked' : ''}}>
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
                            {!! Form::submit($company->created_at ? __('admin.update') : __('admin.create'),['class' => 'btn cyan waves-effect waves-light ']) !!}
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
        CKEDITOR.replace('content-1-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token(),'type'=>'company'])}}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('content-2-{{$locale}}', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token(),'type'=>'company'])}}",
            filebrowserUploadMethod: 'form'
        });
        @endforeach
    </script>
@endsection
