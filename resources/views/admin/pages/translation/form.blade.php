{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $translation->group ? 'Translation - Update' : 'Translation - Create')
@section('content')
    <!-- jQuery Plugin Initialization -->
    <div class="row">
        <div class="col s12 m6 l6">
            <div id="basic-form" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">Translation - {{$translation->key ? 'Update' : 'Create'}}</h4>
                    {!! Form::model($translation,['url' => $url, 'method' => $method]) !!}
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                @foreach($languages as $key => $language)
                                    <li class="tab ">
                                        <a href="#lang-{{$key}}">{{$language->locale}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @foreach($languages as $key => $language)
                            <div id="lang-{{$key}}" class="col s12  mt-5">
                                <div class="input-field ">
                                    {!! Form::text('text['.$language['locale'].']',isset($translation->text[$language['locale']]) ? $translation->text[$language['locale']]:  '',['class' => 'validate '. $errors->has('text.*') ? '' : 'valid']) !!}
                                    {!! Form::label('text['.$language['locale'].']',__('admin.text')) !!}
                                    @error('text.*')
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
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::submit($translation->key ? 'Update' : 'Create',['class' => 'btn cyan waves-effect waves-light right']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

@endsection


