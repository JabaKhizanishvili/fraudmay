{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
<!DOCTYPE html>
@php
use App\Helpers\Helper;
$configData = Helper::applClasses();
@endphp

<html class="loading"
  lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
  data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  <link rel="apple-touch-icon" href="{{asset('images/favicon/apple-touch-icon-152x152.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon/favicon-32x32.png')}}">

  <!-- Include core + vendor Styles -->
  @include('admin.panels.styles')

</head>
<!-- END: Head-->
<body
  class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass'])) {{$configData['bodyCustomClass']}} @endif
          {{request()->route()->getName() === 'loginView' ? 'login-bg' : ''}}
          "
  data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
  <div class="row">
    <div class="col s12">
      <div class="container">
      @include('admin.vendor.alerts')
      <!--  main content -->
        @yield('content')
      </div>
      {{-- overlay --}}
      <div class="content-overlay"></div>
    </div>
  </div>
  {{-- vendor scripts and page scripts included --}}
  @include('admin.panels.scripts')

</body>

</html>
