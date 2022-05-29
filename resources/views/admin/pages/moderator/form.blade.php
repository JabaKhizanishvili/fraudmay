{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $user->id ? __('admin.moderator-update') : 'admin.moderator-create')

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
                    <input name="old-images[]" id="old_images" hidden disabled value="{{$user->files}}">
                    <h4 class="card-title">{{$user->id ? __('admin.moderator-update') : __('admin.moderator-create')}}</h4>
                    {!! Form::model($user,['url' => $url, 'method' => $method,'files' => true]) !!}
                    <div class="row">
                        <div class="col s12 m6 8">
                            <div class="row">

                                <div class="input-field"></div>

                                <div class="input-field col s12">
                                    {!! Form::text('name',$user->profile?$user->profile->name:"",['class' => 'validate '. $errors->has('name') ? '' : 'valid']) !!}
                                    {!! Form::label('name',__('admin.name')) !!}
                                    @error('name')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('surname',$user->profile?$user->profile->surname:"",['class' => 'validate '. $errors->has('surname') ? '' : 'valid']) !!}
                                    {!! Form::label('name',__('admin.surname')) !!}
                                    @error('surname')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('phone',$user->profile?$user->profile->phone:"",['class' => 'validate '. $errors->has('phone') ? '' : 'valid']) !!}
                                    {!! Form::label('phone',__('admin.phone')) !!}
                                    @error('phone')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('email',$user->email,['class' => 'validate '. $errors->has('email') ? '' : 'valid',$user->id?'disabled':""]) !!}
                                    {!! Form::label('email',__('admin.email')) !!}
                                    @error('email')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('password',"",['class' => 'validate '. $errors->has('password') ? '' : 'valid']) !!}
                                    {!! Form::label('password',__('admin.password')) !!}
                                    @error('password')
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
                            {!! Form::submit($user->id ? __('admin.update') : __('admin.create'),['class' => 'btn cyan waves-effect waves-light ']) !!}
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


        {{--        @foreach(config('translatable.locales') as $locale)--}}

        {{--        CKEDITOR.replace('content-{{$locale}}', {--}}
        {{--            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token(),'type'=>'user'])}}",--}}
        {{--            filebrowserUploadMethod: 'form',--}}
        {{--        });--}}
        {{--        @endforeach--}}


    </script>
@endsection
