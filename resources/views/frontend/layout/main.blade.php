 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Southend School Naihati</title>
     <meta name="description" content="">
     <meta name="author" content="">
     <meta name="keywords" content="">
     @include('frontend.layout.partials.headerScript')
    @stack('styles')
 </head>

 <body>

     @include('frontend.layout.partials.header')

     @yield('content')
     <a href="https://api.whatsapp.com/send?phone=9999999999&text=Hello..." class="float" target="_blank">
         <i class="fa fa-whatsapp my-float"></i>
     </a>
     @include('frontend.layout.partials.footer')
     @include('frontend.layout.partials.footerScript')
    @stack('scripts')
 </body>

 </html>
