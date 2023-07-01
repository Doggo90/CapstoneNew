<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        />
            <!-- Toastr CSS -->  
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
            <!-- End Toastr CSS --> 
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Home</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/index"
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            
            <ul class="flex space-x-4 mr-4 text-lg">
                @auth
                    
                <li>
                    <a href="register.html" class="hover:text-laravel">
                        <i class="fa-solid fa-user-circle"></i> 
                        <span class="font-bold uppercase">{{auth()->user()->name}}</span>
                        </a>
                </li>
                <li>
                    <a href="{{route('listings.create')}}" class="hover:text-laravel"><i class="fa-solid fa-pencil-square"></i> Create Post</a>
                </li>
                <li>
                    <a href="register.html" class="hover:text-laravel">
                        <i class="fa-solid fa-book-open"></i>
                        Manage Posts
                    </a>
                </li>
                <li>
                    <a href="{{route('user.logout')}}" class="hover:text-laravel">
                        <i class="fa-solid fa-door-closed"></i>
                        Logout
                    </a>
                </li>
                @else
                <li>
                    <a href="/login" class="hover:text-laravel">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login
                    </a>
                </li>
                <li>
                    <a href="/register" class="hover:text-laravel">
                        <i class="fa-solid fa-user-plus"></i> 
                        Register
                    </a>
                </li>
                @endauth
            </ul>
        </nav>
        
        <main>
          {{$slot}}
        </main>
        <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start  bg-lime-500 h-24 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
        </footer>
        <x-flash-message/>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Toastr js -->
        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
           
               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;
           
               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
           </script>
           <!-- End Toastr js -->
</html>