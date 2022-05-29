{{-- extend layout --}}
@extends('admin.layout.contentLayoutMaster')

{{-- page title --}}
@section('title',__('admin.moderator'))


@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="button-trigger" class="card card card-default scrollspy">

                <div class="card-content">
                    <a class="btn-floating btn-large primary-text gradient-shadow compose-email-trigger "
                       href="{{locale_route('moderator.create')}}">
                        <i class="material-icons">add</i>
                    </a>
                    <h4 class="card-title mt-2">@lang('admin.moderator')</h4>
                    <div class="row">
                        <div class="col s12">
                            <form class="mr-0 p-0">
                                <table id="data-table-simple" class="display">
                                    <thead>
                                    <tr>
                                        <th>@lang('admin.id')</th>
                                        <th>@lang('admin.first_name')</th>
                                        <th>@lang('admin.last_name')</th>
                                        <th>@lang('admin.email')</th>
                                        <th>@lang('admin.actions')</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <th>
                                            <input type="number" name="id" onchange="this.form.submit()"
                                                   value="{{Request::get('id')}}"
                                                   class="validate {{$errors->has('id') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="name" onchange="this.form.submit()"
                                                   value="{{Request::get('name')}}"
                                                   class="validate {{$errors->has('name') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="surname" onchange="this.form.submit()"
                                                   value="{{Request::get('surname')}}"
                                                   class="validate {{$errors->has('surname') ? '' : 'valid'}}">
                                        </th>
                                        <th>
                                            <input type="text" name="email" onchange="this.form.submit()"
                                                   value="{{Request::get('email')}}"
                                                   class="validate {{$errors->has('email') ? '' : 'valid'}}">
                                        </th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                    @if($users)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->profile?$user->profile->name:""}}</td>
                                                <td>{{$user->profile?$user->profile->surname:""}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    <a href="{{locale_route('moderator.show',$user->id)}}">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                    <a href="{{locale_route('moderator.edit',$user->id)}}"
                                                       class="pl-3">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="{{locale_route('moderator.destroy',$user->id)}}"
                                                       onclick="return confirm('Are you sure?')" class="pl-3">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </form>
                            {{ $users->appends(request()->input())->links('admin.vendor.pagination.material') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


