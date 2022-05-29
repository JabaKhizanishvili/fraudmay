<body
  class="{{$configData['mainLayoutTypeClass']}} @if(!empty($configData['bodyCustomClass']) && isset($configData['bodyCustomClass'])) {{$configData['bodyCustomClass']}} @endif"
  data-open="click" data-menu="horizontal-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
  <header class="page-topbar" id="header">
    @include('admin.panels.horizontalNavbar')
  </header>
  <!-- BEGIN: SideNav-->
  @include('admin.panels.sidebar')
  <!-- END: SideNav-->

  <!-- BEGIN: Page Main-->
  <div id="main">
    <div class="row">
      @if($configData["navbarLarge"] === true && isset($configData["navbarLarge"]))
      {{-- navabar large  --}}
      <div class="content-wrapper-before {{$configData["navbarLargeColor"]}}"></div>
      @endif

      @if ($configData["pageHeader"] === true && isset($breadcrumbs))
        {{-- breadcrumb --}}
        @include('admin.panels.breadcrumb')
      @endif
      <div class="col s12">
        <div class="container">
          {{-- main page content  --}}
          @include('admin.vendor.alerts')
          @yield('content')
          {{-- right sidebar  --}}
          @include('pages.sidebar.right-sidebar')
          
          @if($configData["isFabButton"] === true)
            @include('pages.sidebar.fab-menu')
          @endif
        </div>
        {{-- overlay --}}
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>

  <!-- END: Page Main-->


  {{-- main footer  --}}
  @include('admin.panels.footer')

  {{-- vendors and page scripts file   --}}
  @include('admin.panels.scripts')
</body>