  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    .container { 
    height: 200px;
    position: relative;
    }

    .vertical-center {
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    }

    body {
    background: linear-gradient(270deg, #f2b800, #eae6da);
    background-size: 400% 400%;

    -webkit-animation: AnimationName 30s ease infinite;
    -moz-animation: AnimationName 30s ease infinite;
    animation: AnimationName 30s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
@keyframes AnimationName {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}
  </style>

<div class="container mt-5 text-center">
  <div class="center">
     
    <div class="row">
      <div class="col-md-8 offset-md-2">
        @auth
         <span>Welcome {{Auth::user()->name}}</span>
           <a class="btn btn-primary mt-5" href="{{route('home')}}">Dashboard</a>
        @endauth
        @guest
         <span class="text-right">Welcome Guest</span>
           <a class="btn btn-primary mt-5" href="{{route('register')}}">Register</a>
           <a class="btn btn-primary mt-5" href="{{route('login')}}">Login</a>
        @endguest

      </div>
    </div>
    
  </div>
</div>

</div>