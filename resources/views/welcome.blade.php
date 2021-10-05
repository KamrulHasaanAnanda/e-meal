<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-Meal</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
             
                
               
            }
            
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-100 right-100 px-6 py-4 sm:block">
                    <h1 class="text-center" >Welcome To E-meal</h1>
                   
                    <div class="text-center">
                    @auth
                       <a href="{{ url('/home') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Home</a>
                    @else
                      <a href="{{ route('login') }}"class="btn btn-success btn-lg active" role="button" aria-pressed="true">Log in</a></button>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Register</a>
                        @endif
                        
                    @endauth
                </div>
            @endif
        </div>
        </div>
    </body>
</html>
