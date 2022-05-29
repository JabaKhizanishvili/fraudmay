{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $user->id ? __('admin.user-update') : 'admin.user-create')

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
                    <h4 class="card-title">{{$user->id ? __('admin.user-update') : __('admin.user-create')}}</h4>
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

                                <div class="input-field col s12">

                                    <select name="status" class="select2 js-example-programmatic browser-default">
                                        <option
                                            {{$user->status=='waiting'?"selected":""}} value="waiting">@lang('client.waiting')</option>
                                        <option
                                            {{$user->status=='approved'?"selected":""}} value="approved">@lang('client.approved')</option>
                                        <option
                                            {{$user->status=='rejected'?"selected":""}} value="rejected">@lang('client.rejected')</option>
                                    </select>

                                    <label class="active" for="category_id">{{__('admin.status')}}</label>

                                    @error('status')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">

                                    <select name="verified" class="select2 js-example-programmatic browser-default">
                                        <option
                                            {{$user->verified?"selected":""}} value="1">@lang('client.verified')</option>
                                        <option
                                            {{!$user->verified?"selected":""}} value="0">@lang('client.not_verified')</option>
                                    </select>

                                    <label class="active" for="category_id">{{__('admin.verified')}}</label>

                                    @error('verified')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('crypto_address[btc]',$user->crypto_address?$user->getAddressByCrypto('btc'):"",['class' => 'validate '. $errors->has('btc_address') ? '' : 'valid']) !!}
                                    {!! Form::label('btc_address',__('admin.btc_address')) !!}
                                    @error('eur')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('crypto_address[eth]',$user->crypto_address?$user->getAddressByCrypto('eth'):"",['class' => 'validate '. $errors->has('eth_address') ? '' : 'valid']) !!}
                                    {!! Form::label('eth_address',__('admin.eth_address')) !!}
                                    @error('eth_address')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('crypto_address[usdt]',$user->crypto_address?$user->getAddressByCrypto('usdt'):"",['class' => 'validate '. $errors->has('usdt') ? '' : 'valid']) !!}
                                    {!! Form::label('usdt_address',__('admin.usdt_address')) !!}
                                    @error('usdt_address')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('crypto_address[dog]',$user->balance?$user->getAddressByCrypto('dog'):"",['class' => 'validate '. $errors->has('dog_address') ? '' : 'valid']) !!}
                                    {!! Form::label('dog_address',__('admin.dog_address')) !!}
                                    @error('dog_address')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('crypto_address[withdrawal]',$user->balance?$user->getAddressByCrypto('withdrawal'):"",['class' => 'validate '. $errors->has('withdrawal_address') ? '' : 'valid']) !!}
                                    {!! Form::label('withdrawal_address',__('admin.withdrawal_address')) !!}
                                    @error('withdrawal_address')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="col s12 mt-3 mb-3">
                                    <label>
                                        <input type="checkbox" name="is_send_email"
                                               value="true" {{$user->is_send_email ? 'checked' : ''}}>
                                        <span>{{__('admin.send_email')}}</span>
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
                        <div class="col s12 m6 8">
                            <div class="row">
                                <div class="input-field"></div>
                                <div class="input-field col s12">
                                    {!! Form::text('balance[usd]',$user->balance?$user->getBalanceByCurrency('usd'):"",['class' => 'validate '. $errors->has('usd') ? '' : 'valid']) !!}
                                    {!! Form::label('usd',__('admin.usd')) !!}
                                    @error('usd')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('balance[eur]',$user->balance?$user->getBalanceByCurrency('eur'):"",['class' => 'validate '. $errors->has('eur') ? '' : 'valid']) !!}
                                    {!! Form::label('eur',__('admin.eur')) !!}
                                    @error('eur')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('balance[gbp]',$user->balance?$user->getBalanceByCurrency('gbp'):"",['class' => 'validate '. $errors->has('gbp') ? '' : 'valid']) !!}
                                    {!! Form::label('gbp',__('admin.gbp')) !!}
                                    @error('gbp')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('balance[rub]',$user->balance?$user->getBalanceByCurrency('rub'):"",['class' => 'validate '. $errors->has('rub') ? '' : 'valid']) !!}
                                    {!! Form::label('rub',__('admin.rub')) !!}
                                    @error('rub')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('balance[uah]',$user->balance?$user->getBalanceByCurrency('uah'):"",['class' => 'validate '. $errors->has('uah') ? '' : 'valid']) !!}
                                    {!! Form::label('uah',__('admin.uah')) !!}
                                    @error('uah')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('balance[aud]',$user->balance?$user->getBalanceByCurrency('aud'):"",['class' => 'validate '. $errors->has('aud') ? '' : 'valid']) !!}
                                    {!! Form::label('aud',__('admin.aud')) !!}
                                    @error('aud')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>

                                <div class="input-field col s12">
                                    {!! Form::text('balance[btc]',$user->balance?$user->getBalanceByCurrency('btc'):"",['class' => 'validate '. $errors->has('btc') ? '' : 'valid']) !!}
                                    {!! Form::label('btc',__('admin.btc')) !!}
                                    @error('btc')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('balance[eth]',$user->balance?$user->getBalanceByCurrency('eth'):"",['class' => 'validate '. $errors->has('eth') ? '' : 'valid']) !!}
                                    {!! Form::label('eth',__('admin.eth')) !!}
                                    @error('eth')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('balance[usdt]',$user->balance?$user->getBalanceByCurrency('usdt'):"",['class' => 'validate '. $errors->has('usdt') ? '' : 'valid']) !!}
                                    {!! Form::label('usdt',__('admin.usdt')) !!}
                                    @error('usdt')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('balance[dog]',$user->balance?$user->getBalanceByCurrency('dog'):"",['class' => 'validate '. $errors->has('dog') ? '' : 'valid']) !!}
                                    {!! Form::label('dog',__('admin.dog')) !!}
                                    @error('dog')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('manager_name',$user->manager_name,['class' => 'validate '. $errors->has('manager_name') ? '' : 'valid']) !!}
                                    {!! Form::label('manager_name',__('admin.manager_name')) !!}
                                    @error('manager_name')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('manager_email',$user->manager_email,['class' => 'validate '. $errors->has('manager_email') ? '' : 'valid']) !!}
                                    {!! Form::label('manager_email',__('admin.manager_email')) !!}
                                    @error('manager_email')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('manager_phone',$user->manager_phone,['class' => 'validate '. $errors->has('manager_phone') ? '' : 'valid']) !!}
                                    {!! Form::label('manager_phone',__('admin.manager_phone')) !!}
                                    @error('manager_phone')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    {!! Form::text('link',$user->link,['class' => 'validate '. $errors->has('link') ? '' : 'valid']) !!}
                                    {!! Form::label('link',__('admin.link')) !!}
                                    @error('link')
                                    <small class="errorTxt4">
                                        <div class="error">
                                            {{$message}}
                                        </div>
                                    </small>
                                    @enderror
                                </div>
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
