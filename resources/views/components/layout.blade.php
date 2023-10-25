<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/logo1.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        @livewireStyles
        @filamentStyles
        @vite('resources/css/app.css')
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
        <title>CvSU Acad Forum</title>
        <style>
            [x-cloak] {
                display: none !important;
            }
                html, body {
                    margin: 0;
                    padding: 0;
                    height: 100%;
                }

                body {
                    display: flex;
                    flex-direction: column;
                }

                .main-content {
                    flex: 1;
                }
        </style>
    </head>
    <body class="mb-48">

        @include('components.navbar')


        <div class="main-content">
            <div class="mb-10">
                {{$slot}}
            </div>
        </div>







        @include('partials._backtotop')

        <x-flash-message/>
        @livewireScripts
        @filamentScripts
        @vite('resources/js/app.js')
        @livewire('notifications')
    </body>
    <footer class="left-0 w-full flex items-center justify-start h-24 mt-24 opacity-100 md:justify-center" style="z-index: 1;">
        <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Toastr js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
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
