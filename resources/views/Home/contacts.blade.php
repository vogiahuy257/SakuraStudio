<!DOCTYPE html>
<html lang="{{session('locale')}}">
<head>
    <meta charset="UTF-8">
    <title>Contact Management</title>
    
    <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">   

    {{-- Link logo icon --}}
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite([
    'resources/css/Home.css'
    ])

    <style>
      .delete-btn {
          background-color: rgb(255, 5, 5);
          border: none;
      }
      .delete-btn:hover {
          background-color: rgb(200, 0, 0);
          color: black
      }
        body{
            background-color: #ffddd2;
        }
  </style>

</head>
<body>

    {{-- Menu section --}}
     @include('Home.layout.menu')


        {{-- CONTACT section --}}
      @include('Home.layout.contact')





      {{-- link excel --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>

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

                    // lang Home\layout\menu
                    @include('Home.lang.menu')

                    // lang Home\layout\contact
                    @include('Home.lang.contact')

            })
                .catch(error => console.error('Error loading language file:', error));
            }
      </script>

      </script>
       
</body>
</html>
