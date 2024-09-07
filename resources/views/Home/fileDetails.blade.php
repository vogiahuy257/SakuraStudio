<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fileDetails</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">   

    {{-- Link logo icon --}}
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">

     <!-- CSS -->
     @vite(['resources/css/Home.css'])

    <style>
        body{
            background-color: #ffddd2;
        }
    </style>

</head>
<body>

    {{-- Home\layout\menu --}}
    @include('Home.layout.menu')

    {{-- model show file --}}
    <section id="model">
        @include('Home.layout.model')
    </section>
      

      <!-- icon -->
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
      <script src="{{asset('js/Contact/contacts.js')}}"></script>

      <script>
           document.addEventListener('DOMContentLoaded', function() {
                    loadLanguage('{{ session('locale', 'en') }}');
            });
                function loadLanguage(lang) {
            fetch(`/js/lang/${lang}.json`)
            .then(response => response.json())
                .then(data => {

                    // lang Home\lang\menu
                    @include('Home.lang.menu');

                    // lang Home\layout\fileDetalis
                    @include('Home.lang.fileDetails');
                    
            })
                .catch(error => console.error('Error loading language file:', error));
            }
      </script>
</body>
</html>
