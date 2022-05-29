{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')
{{-- page title --}}
@section('title', $user->profile->name)



@section('content')
    <!-- users view start -->
    <div class="card-panel">
        <div class="row">
            <div class="col s12 m7">
                <div class="display-flex media">
                    <div class="media-body">
                        <h6 class="media-heading">
                            <span class="users-view-name">{{$user->profile->name}} </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                <a href="{{locale_route('user.edit',$user->id)}}" class="btn-small indigo">
                    @lang('admin.edit')
                </a>
                <a class="btn-small -settings waves-effect -light -btn right ml-3"
                   href="{{locale_route('user.destroy',$user->id)}}"
                   onclick="return confirm('Are you sure?')">
                    <span class="hide-on-small-onl">
                        @lang('admin.delete')
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s12 m4">
                    <table class="striped">
                        <tbody>
                        <tr>
                            <td>@lang('admin.status'):</td>
                            <td>
                                @if($user->status=='waiting')
                                    <span class="chip blue lighten-5 blue-text">@lang('admin.waiting')</span>
                                @elseif($user->status=='approved')
                                    <span class="chip green lighten-5 green-text">@lang('admin.approved')</span>
                                @else
                                    <span class="chip red lighten-5 red-text">@lang('admin.rejected')</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.name'):</td>
                            <td>
                                {{$user->profile->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.surname')</td>
                            <td>{{$user->profile->surname}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.phone')</td>
                            <td>{{$user->profile->phone}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.email')</td>
                            <td>{{$user->email}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.verified')</td>
                            <td>{{$user->verified?__('admin.verified'):__('admin.not_verified')}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.manager_name')</td>
                            <td>{{$user->manager_name}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.manager_email')</td>
                            <td>{{$user->manager_email}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.manager_phone')</td>
                            <td>{{$user->manager_phone}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12 m4">
                    <h4>Balances</h4>
                    <table class="striped">
                        <tbody>

                        <tr>
                            <td>@lang('admin.usd'):</td>
                            <td>
                                {{$user->getBalanceByCurrency('usd')}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.eur')</td>
                            <td>{{$user->getBalanceByCurrency('eur')}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.gbp')</td>
                            <td>{{$user->getBalanceByCurrency('gbp')}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.rub')</td>
                            <td>{{$user->getBalanceByCurrency('rub')}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.uah')</td>
                            <td>{{$user->getBalanceByCurrency('uah')}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.aud')</td>
                            <td>{{$user->getBalanceByCurrency('aud')}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.btc')</td>
                            <td>{{$user->getBalanceByCurrency('btc')}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.eth')</td>
                            <td>{{$user->getBalanceByCurrency('eth')}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.usdt')</td>
                            <td>{{$user->getBalanceByCurrency('usdt')}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.dog')</td>
                            <td>{{$user->getBalanceByCurrency('dog')}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12 m4">
                    <h4>Addresses</h4>
                    <table class="striped">
                        <tbody>

                        <tr>
                            <td>@lang('admin.btc_address'):</td>
                            <td>
                                {{$user->getAddressByCrypto('btc')}}
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('admin.eth_address'):</td>
                            <td>{{$user->getAddressByCrypto('eth')}}</td>
                        </tr>
                        <tr>
                            <td>@lang('admin.usdt_address'):</td>
                            <td>{{$user->getAddressByCrypto('usdt')}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.dog_address'):</td>
                            <td>{{$user->getAddressByCrypto('dog')}}</td>
                        </tr>

                        <tr>
                            <td>@lang('admin.withdrawal_address'):</td>
                            <td>{{$user->getAddressByCrypto('withdrawal')}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="section">
        <div class="masonry-gallery-wrapper">
            <div class="popup-gallery">
                <div class="row">
                    @if($user->driverLicense)
                        <div class="col s12 m6 l3">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title mb-0">{{__('client.driver_license')}}</h4>
                                    <br>
                                    <div class="row">
                                        <div>
                                            <a href="{{asset($user->driverLicense->path.'/'.$user->driverLicense->title)}}"
                                               target="_blank"
                                               title="$file->title">
                                                @if($user->driverLicense->format=='jpg'||$user->driverLicense->format=='png' || $user->driverLicense->format=='svg')
                                                    <img
                                                        style="max-height: 400px;display: block;margin:auto"
                                                        src="{{asset($user->driverLicense->path.'/'.$user->driverLicense->title)}}"
                                                        class="responsive-img mb-10"
                                                        alt="">
                                                @else
                                                    <p>{{$user->driverLicense->title}}</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($user->nationalId)
                        <div class="col s12 m6 l3">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title mb-0">{{__('client.national_id')}}</h4>
                                    <br>
                                    <div class="row">
                                        <div>
                                            <a href="{{asset($user->nationalId->path.'/'.$user->nationalId->title)}}"
                                               target="_blank"
                                               title="file->title">
                                                @if($user->nationalId->format=='jpg'||$user->nationalId->format=='png' || $user->nationalId->format=='svg')
                                                    <img
                                                        style="max-height: 400px;display: block;margin:auto"
                                                        src="{{asset($user->nationalId->path.'/'.$user->nationalId->title)}}"
                                                        class="responsive-img mb-10"
                                                        alt="">
                                                @else
                                                    <p>{{$user->nationalId->title}}</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($user->passport)
                        <div class="col s12 m6 l3">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title mb-0">{{__('client.passport')}}</h4>
                                    <br>
                                    <div class="row">
                                        <div>
                                            <a href="{{asset($user->passport->path.'/'.$user->passport->title)}}"
                                               target="_blank"
                                               title="file->title">
                                                @if($user->passport->format=='jpg'||$user->passport->format=='png' || $user->passport->format=='svg')
                                                    <img style="max-height: 400px;display: block;margin:auto"
                                                         src="{{asset($user->passport->path.'/'.$user->passport->title)}}"
                                                         class="responsive-img mb-10"
                                                         alt="">
                                                @else
                                                    <p>{{$user->passport->title}}</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($user->bankStatement)
                        <div class="col s12 m6 l3">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">{{__('client.bank_statement')}}</h4>
                                    <br>
                                    <div class="row">
                                        <div>
                                            <a href="{{asset($user->bankStatement->path.'/'.$user->bankStatement->title)}}"
                                               target="_blank"
                                               title="file->title">
                                                @if($user->bankStatement->format=='jpg'||$user->bankStatement->format=='png' || $user->bankStatement->format=='svg')
                                                    <img style="max-height: 400px;display: block;margin:auto"
                                                         src="{{asset($user->bankStatement->path.'/'.$user->bankStatement->title)}}"
                                                         class="responsive-img mb-10"
                                                         alt="">
                                                @else
                                                    <p>{{$user->bankStatement->title}}</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($user->selfieWithDocument)
                        <div class="col s12 m6 l3">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title mb-0">{{__('client.selfie_with_document')}}</h4>
                                    <br>
                                    <div class="row">
                                        <div>
                                            <a href="{{asset($user->selfieWithDocument->path.'/'.$user->selfieWithDocument->title)}}"
                                               target="_blank"
                                               title="file->title">
                                                @if($user->selfieWithDocument->format=='jpg'||$user->selfieWithDocument->format=='png' || $user->selfieWithDocument->format=='svg')
                                                    <img
                                                        style="max-height: 400px;display: block;margin:auto"
                                                        src="{{asset($user->selfieWithDocument->path.'/'.$user->selfieWithDocument->title)}}"
                                                        class="responsive-img mb-10"
                                                        alt="">
                                                @else
                                                    <p>{{$user->selfieWithDocument->title}}</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                {{--                <div class="row">--}}
                {{--                    @if($user->selfieWithDocument)--}}
                {{--                        <div class="col s12 m6 l3">--}}
                {{--                            <div class="card">--}}
                {{--                                <div class="card-content">--}}
                {{--                                    <h4 class="card-title mb-0">{{__('client.selfie_with_document')}}</h4>--}}
                {{--                                    <br>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div>--}}
                {{--                                            <a href="{{asset($user->selfieWithDocument->path.'/'.$user->selfieWithDocument->title)}}"--}}
                {{--                                               target="_blank"--}}
                {{--                                               title="file->title">--}}
                {{--                                                @if($user->selfieWithDocument->format=='jpg'||$user->selfieWithDocument->format=='png' || $user->selfieWithDocument->format=='svg')--}}
                {{--                                                    <img--}}
                {{--                                                        style="max-height: 400px;display: block;margin:auto"--}}
                {{--                                                        src="{{asset($user->selfieWithDocument->path.'/'.$user->selfieWithDocument->title)}}"--}}
                {{--                                                        class="responsive-img mb-10"--}}
                {{--                                                        alt="">--}}
                {{--                                                @else--}}
                {{--                                                    <p>{{$user->selfieWithDocument->title}}</p>--}}
                {{--                                                @endif--}}
                {{--                                            </a>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    @endif--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

    @if(count($user->userFiles)>0)
        <div class="section">
            <h4>{{__('client.user_files')}}</h4>
            <div class="section">
                <div class="masonry-gallery-wrapper">
                    <div class="popup-gallery">
                        <div class="gallery-sizer"></div>
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    @foreach($user->userFiles as $file)
                                        <div class="col s12 m6 l4 xl2">
                                            <div>
                                                <a href="{{asset($file->path.'/'.$file->title)}}" target="_blank"
                                                   title="$file->title">
                                                    @if($file->format=='jpg'||$file->format=='png' || $file->format=='svg')
                                                        <img src="{{asset($file->path.'/'.$file->title)}}"
                                                             class="responsive-img mb-10"
                                                             alt="">
                                                    @else
                                                        <p>{{$file->title}}</p>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection


