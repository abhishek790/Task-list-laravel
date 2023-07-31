<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Laravel</title>
</head>
<body>
    {{-- show blade php does not know where exactly to render this info so to handle this problem you actually need to add directives into the template. You need to define a section and inside this parent layout you just render the content fo particular section this is done using a yield directive and inside we put sections--}}

    <h1>@yield('title')</h1>
    <div>
        @yield('content')
    </div>
</body>
</html>