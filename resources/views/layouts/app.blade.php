<!DOCTYPE html>
<html>
   <head>
        <title>@yield('title')</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="format-detection" content="telephone=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   </head>
   <body class="">
         <div class="content_main_div">
            @yield('content')
         </div>
          <footer>
            @include('layouts.includes.footer')
         </footer>
   </body>
</html>
