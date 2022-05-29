{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', 'admin.change-password')

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
                    <h4 class="card-title">{{__('admin.change_password')}}</h4>
                    {!! Form::model($user,['url' => locale_route('store-password'), 'method' => 'POST','files' => true]) !!}
                    <div class="row">
                        <div class="col s12 m6 8">
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::password('password',['class' => 'validate '. $errors->has('password') ? '' : 'valid']) !!}
                                    {!! Form::label('password',__('admin.password')) !!}
                                    @error('password')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::password('repeat_password',['class' => 'validate '. $errors->has('repeat_password') ? '' : 'valid']) !!}
                                    {!! Form::label('repeat_password',__('admin.repeat_password')) !!}
                                    @error('repeat_password')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {!! Form::submit( __('admin.submit'),['class' => 'btn cyan waves-effect waves-light ']) !!}
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
