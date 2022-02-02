<html>
    <head>
        <title>
            Laravel Tutorial - @yield('title')
        </title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script src="{mix('js/app.js')}" defer></script>
    </head>
    <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Laravel Blog</h5>
        <nav class="my-2 my-md-0 mr-md-3">
      
                <a class="p-2 text-dark"   href="{{route('home.index')}}">Home</a>
                <a class="p-2 text-dark"  href="{{route('home.contact')}}">Contact</a>
                <a class="p-2 text-dark"  href="{{route('posts.index')}}">Blog Post</a>
                <a class="p-2 text-dark"  href="{{route('posts.create')}}">Add Blog Post</a>
            </nav>
        </div>
        <div class="container">

        </div>
        @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
       </div>
        @endif
        @yield('content')

    </body>
</html>