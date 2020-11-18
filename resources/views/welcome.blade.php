
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tattos By Pollo</title>
        <!-- Fonts -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="icon" type="image/svg+xml" href="{{ asset('storage/logo.png')}}"  sizes="any">
        <style>
            body {
                background-image: url("{{ asset('storage/IMG_FONDOPOLLO.jpg')}}");
                background-size: cover;
            }
            .loading {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                transition: 1s all;
                opacity: 0;
            }
            .loading.show {
                opacity: 1;
            }
            .loading .spin {
                border: 3px solid hsla(185, 100%, 62%, 0.2);
                border-top-color: #3cefff;
                border-radius: 50%;
                width: 3em;
                height: 3em;
                animation: spin 1s linear infinite;
            }
            @keyframes spin {
              to {
                transform: rotate(360deg);
              }
            }            
        </style>
        <script>
            // Loading
            var Loading=(loadingDelayHidden=0)=>{let loading=null;const myLoadingDelayHidden=loadingDelayHidden;let imgs=[];let lenImgs=0;let counterImgsLoading=0;function incrementCounterImgs(){counterImgsLoading+=1;if(counterImgsLoading===lenImgs){hideLoading()}}function hideLoading(){if(loading!==null){loading.classList.remove('show');setTimeout(function(){loading.remove()},myLoadingDelayHidden)}}function init(){document.addEventListener('DOMContentLoaded',function(){loading=document.querySelector('.loading');imgs=Array.from(document.images);lenImgs=imgs.length;if(imgs.length===0){hideLoading()}else{imgs.forEach(function(img){img.addEventListener('load',incrementCounterImgs,false)})}})}return{'init':init}}

            Loading(1000).init();
        </script>
    </head>
    
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <a class="navbar-brand text-white" href="#">Tattoos By Pollo</a>
                <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                    <a class="nav-link text-white" href="{{ url('/')}}"> 
                          Home
                    </a>
                    <a class="nav-link active text-white" href="{{ route('tattoos') }}">
                          Tattoos
                    </a>
                    <a class="nav-link text-white" href="{{ route('pinturas') }}">
                          Pinturas
                    </a>
                    <a class="nav-link text-white" href="{{ route('cotizar') }}" tabindex="-1" aria-disabled="false">
                          Cotizar
                    </a>
                  </div>
                </div>
            </nav>
            <main class="py-4">
                <div class="loading show">
                    <div class="spin"></div>
                </div>
                @yield('content')
            </main>
            </div>
        </div>
        
    </body>
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @endif
                </div>
    @endif
</html>

