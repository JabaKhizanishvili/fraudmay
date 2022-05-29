<body
  class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])) {{$configData['bodyCustomClass']}} @endif @if($configData['isMenuCollapsed'] && isset($configData['isMenuCollapsed'])){{'menu-collapse'}} @endif"
  data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    @include('admin.panels.navbar')
  </header>
  <!-- END: Header-->

  <!-- BEGIN: SideNav-->
  @include('admin.panels.sidebar')
  <!-- END: SideNav-->
  <div id="main">
    <div class="row">
      @if ($configData["navbarLarge"] === true)
        @if(($configData["mainLayoutType"]) === 'vertical-modern-menu')
        {{-- navabar large  --}}
        <div
          class="content-wrapper-before @if(!empty($configData['navbarBgColor'])) {{$configData['navbarBgColor']}} @else {{$configData["navbarLargeColor"]}} @endif">
        </div>
        @else
        {{-- navabar large  --}}
        <div class="content-wrapper-before {{$configData["navbarLargeColor"]}}">
        </div>
        @endif
      @endif
      @include('admin.panels.breadcrumb')
      <div class="col s12">
        <div class="container">
            @include('admin.vendor.alerts')

            {{-- main page content --}}
          @yield('content')
        </div>
        {{-- overlay --}}
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>
  <!-- END: Page Main-->

  {{-- footer  --}}
  @include('admin.panels.footer')
  {{-- vendor and page scripts --}}
  @include('admin.panels.scripts')
</body>