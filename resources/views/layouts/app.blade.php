<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- below comment specifies blade formatter should not reformat the css because it's not really a 100% valid css. It is being parsed by this tailwind cdn .If you do not add this comment the blade formatter that we installed would refromat it and it will break it--}}
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            /* In tailwind to apply couple of tailwind classes to one element or one class we use apply directive */
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input,textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .error{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}
   
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
   
    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div>
    
        @if(session()->has('success'))
            <div>{{session('success')}}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>