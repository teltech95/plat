<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>User | Dashboard</title>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <link rel="stylesheet" href="{{ asset('ssb/css/bootstrap.css') }}" >
      <link rel="stylesheet" href="{{ asset('ssb/css/site.css') }}" >
      <link rel="stylesheet" href="{{ asset('ssb/css/all.min.css') }}" >

      <link rel="stylesheet" href="{{ asset('ssb/css/sidebar.css') }}" />
      <link rel="stylesheet" href="{{ asset('ssb/css/select2.min.css') }}" />
      <link href="{{ asset('ssb/css/all.css')}}" rel="stylesheet" />
      <link href="{{ asset('ssb/css/jquery-ui.min.css')}}" rel="stylesheet" />
      <script type="text/javascript">
         var appInsights=window.appInsights||function(a){
             function b(a){c[a]=function(){var b=arguments;c.queue.push(function(){c[a].apply(c,b)})}}var c={config:a},d=document,e=window;setTimeout(function(){var b=d.createElement("script");b.src=a.url||"https://az416426.vo.msecnd.net/scripts/a/ai.0.js",d.getElementsByTagName("script")[0].parentNode.appendChild(b)});try{c.cookie=d.cookie}catch(a){}c.queue=[];for(var f=["Event","Exception","Metric","PageView","Trace","Dependency"];f.length;)b("track"+f.pop());if(b("setAuthenticatedUserContext"),b("clearAuthenticatedUserContext"),b("startTrackEvent"),b("stopTrackEvent"),b("startTrackPage"),b("stopTrackPage"),b("flush"),!a.disableExceptionTracking){f="onerror",b("_"+f);var g=e[f];e[f]=function(a,b,d,e,h){var i=g&&g(a,b,d,e,h);return!0!==i&&c["_"+f](a,b,d,e,h),i}}return c
         }({
             sdkExtension: 'ar',
         instrumentationKey: '66bf6d36-f080-4cf9-9fbe-d736350da77b'
         });

         window.appInsights=appInsights,appInsights.queue&&0===appInsights.queue.length&&appInsights.trackPageView();

      </script><script type="text/javascript">
         var appInsights=window.appInsights||function(a){
             function b(a){c[a]=function(){var b=arguments;c.queue.push(function(){c[a].apply(c,b)})}}var c={config:a},d=document,e=window;setTimeout(function(){var b=d.createElement("script");b.src=a.url||"https://az416426.vo.msecnd.net/scripts/a/ai.0.js",d.getElementsByTagName("script")[0].parentNode.appendChild(b)});try{c.cookie=d.cookie}catch(a){}c.queue=[];for(var f=["Event","Exception","Metric","PageView","Trace","Dependency"];f.length;)b("track"+f.pop());if(b("setAuthenticatedUserContext"),b("clearAuthenticatedUserContext"),b("startTrackEvent"),b("stopTrackEvent"),b("startTrackPage"),b("stopTrackPage"),b("flush"),!a.disableExceptionTracking){f="onerror",b("_"+f);var g=e[f];e[f]=function(a,b,d,e,h){var i=g&&g(a,b,d,e,h);return!0!==i&&c["_"+f](a,b,d,e,h),i}}return c
         }({
             sdkExtension: 'ar',
         instrumentationKey: '66bf6d36-f080-4cf9-9fbe-d736350da77b'
         });

         window.appInsights=appInsights,appInsights.queue&&0===appInsights.queue.length&&appInsights.trackPageView();

      </script>
   </head>
   <body>
      <div class="wrapper">
         <nav id="sidebar" class="d-print-none">
            <ul class="list-unstyled" style="margin-top:0px">
               <li><a class="text-white-50" href="/normal/dashboard"><i class="text-white fa fa-home w24"></i> Deductions</a></li>
               <li><a class="text-white-50" href="{{route('normal.my_account')}}"><i class="text-warning fa fa-envelope w24"></i> My Account</a></li>
               <li class="dropdown-divider"></li>

            </ul>
         </nav>
         <div id="content">
            <header>
               <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-dark fixed-top shadow-sm bg-light" style="height:68px;">
                  <div class="container-fluid">
                     <button type="button" id="sidebarCollapse" class="navbar-btn mr-2 active">
                     <span></span>
                     <span></span>
                     <span></span>
                     </button>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <a class="navbar-brand" href="/normal/dashboard">User</a>
                     <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <div class="mr-auto">
                           <div class="breadcrumb pb-0" style="background: none !important"></div>
                        </div>
                        <div style="max-width:200px" class="mx-3"></div>
                        <ul class="navbar-nav">

                           <li class="nav-item">
                              <a class="nav-link text-dark" title="Manage" ></i> {{ Auth::user()->name }}</a>
                           </li>
                           <li class="nav-item">
                              <form class="form-inline" method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-danger">Logout </i></button>
                              </form>
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
            </header>
            <div class="mx-4">
                @yield('content')
            </div>
         </div>
      </div>
      <footer class="footer-sm footer-md mt-5">
      </footer>
      <script src="{{ asset('ssb/js/jquery.min.js') }}"></script>
      <script src="{{ asset('ssb/js/bootstrap.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('ssb/js/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('ssb/js/site.js') }}"></script>
      <script src="{{ asset('ssb/js/select2.min.js') }}"></script>
      <script src="{{ asset('ssb/js/jquery.validate.min.js') }}" ></script>
      <script src="{{ asset('ssb/js/jquery.validate.unobtrusive.min.js') }}" ></script>


      <script src="{{ asset('ssb/js/accounting.min.js') }}"></script>
      <script type="text/javascript">
         $(document).ready(function () {
             $(".datepicker").datepicker({ dateFormat: "yy-mm-dd" });
             $('#sidebarCollapse').on('click', function () {
                 if (!$('#sidebar').hasClass('sidebar-transition')) $('#sidebar').addClass('sidebar-transition');
                 $('#sidebar').toggleClass('active');
                 $(this).toggleClass('active');
                 localStorage.setItem("sideBarCollapse", $('#sidebar').hasClass('active'));
             });
             if (localStorage.getItem('sideBarCollapse') == 'true') $('#sidebar').toggleClass('active');
             $(".select2").select2();
         });
      </script>
      <script type="text/javascript" src="{{ asset('ssb/js/plotly/plotly.min.js') }}"></script>
      <script type="text/javascript">
         function unpack(rows, key) {
             return rows.map(function (row) { return row[key]; });
         }
      </script>
   </body>
</html>
