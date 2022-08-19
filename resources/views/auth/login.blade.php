<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8" >
      <meta name="viewport" content="width=device-width, initial-scale=1.0" >
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Login - NDASENDA™</title>
      <link rel="stylesheet" href="{{ asset('ssb/css/bootstrap.css') }}" >
      <link rel="stylesheet" href="{{ asset('ssb/css/site.css') }}" >
      <link rel="stylesheet" href="{{ asset('ssb/css/all.min.css') }}" >

   </head>
   <body>
      <div class="container mt-5">
         <main role="main" class="pb-3">
            <h3 class="text-white font-weight-light">Login</h3>
            <div class="text-center mb-3">
               <img src="{{ asset('ssb/img/ndasenda.png') }}" style="height:36px" />
               <h3>Corporate Deductions Platform</h3>
            </div>
            <hr />
            <div style="background-image: url({{ asset('ssb/img/home-banner.jpg') }}); background-size: 100%; background-repeat:no-repeat">
               <div class="row">
                  <div class="col-lg-4  col-md-6 col-sm-8 ">
                     <section>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                           <div class="card shadow shadow-lg ml-3 mt-3" >
                              <div class="card-body bg-white">
                                 <h3>Login</h3>
                                 @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                                 <hr />
                                 <div class="form-group">
                                    <label for="Input_Email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                 </div>
                                 <div class="form-group">
                                    <a href="{{ route('register') }}">Create Account</a>
                                 </div>
                              </div>
                              <div class="card-footer text-right">
                                 <button type="submit" class="btn btn-success">Log in </button>
                              </div>

                           </div>
                        </form>
                     </section>
                  </div>
                  <div class="col-md-4 col-md-offset-2 text-white">
                     <section>
                     </section>
                  </div>
               </div>
            </div>
         </main>
      </div>
      <footer class="footer-sm footer-md mt-5">
         <div class="bg-black text-white-50 px-5 pb-5 pt-3" style="min-height: 200px">
            <div class="row">
               <div class="col-md-3 col-sm-4 mb-3">
                  <div class="text-white">© 2022 | All Rights Reserved</div>
                  <div class="small">
                     <div>FN Software Solutions Private Limited</div>
                     <div>Harare, Zimbabwe</div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 mb-3">
                  <div class="text-white"> Customer Service Contact</div>
                  <div class="small">
                     <div><a class="text-white-50" href="mailto:care@ndasenda.co.zw">care@ndasenda.co.zw</a></div>
                     <div>+263 73 635 4251</div>
                     <div>+263 73 781 1582</div>
                     <div>+263 86 77005 353</div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-4 mb-3">
                  <div class="text-white">Company Address</div>
                  <address class="small">
                     FN Software Solutions Private Limited<br />
                     4 Phillips Avenue,<br />
                     Belgravia, Harare, Zimbabwe.
                  </address>
               </div>
               <div class="col-md-3 col-sm-4 mb-3"></div>
            </div>
         </div>
      </footer>

      <script src="{{ asset('ssb/js/jquery.min.js') }}"></script>
      <script src="{{ asset('ssb/js/bootstrap.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('ssb/js/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('ssb/js/site.js') }}"></script>
      <script src="{{ asset('ssb/js/select2.min.js') }}"></script>
      <script src="{{ asset('ssb/js/jquery.validate.min.js') }}" ></script>
      <script src="{{ asset('ssb/js/jquery.validate.unobtrusive.min.js') }}" ></script>
   </body>
</html>
