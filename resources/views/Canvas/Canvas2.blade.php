<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas thank you cards 2</title>

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"> 
    <!-- Link logo icon -->
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">
    {{-- link font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CO&display=swap" rel="stylesheet">
    @vite([
    'resources/css/Canvas.css',
    'resources/js/Canvas/Canvas2.js'
    ])

    <style>
        .User{
            font-family: "Playwrite CO", cursive;
        }
    </style>

</head>
<body>

    {{-- phần menu ben Home --}}
    @include('Home.layout.menu')

   @include('Canvas.layout.main')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Link filer zip --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <!-- Link to xlsx.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
        {{-- link bootstrap icon --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>