<!DOCTYPE html>
<html lang="{{ session('locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">   

    {{-- Link logo icon --}}
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">

     <!-- CSS -->
     @vite(['resources/css/Home.css'])
    <style>
        #setting{
            width: 80%;
            margin: auto;
            margin-top: 100px;
        }

        #settingHeaderText{
            color: #AE7B37;
        }
    </style>

</head>
<body>
    <!-- HOME SECTION -->
    
     @include('Home.layout.menu')

     <section id="setting">
            @include('Home.layout.setting')
     </section>
      

      <!-- icon -->
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    

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

                    // lang Home\layout\setting
                    @include('Home.lang.setting');
            })
                .catch(error => console.error('Error loading language file:', error));
            }
      </script>
</body>
</html>
