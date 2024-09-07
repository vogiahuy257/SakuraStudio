<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">   

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&family=Playwrite+AU+TAS:wght@100..400&family=Playwrite+IT+Moderna:wght@100..400&family=Playwrite+RO:wght@100..400&family=Rubik+Glitch+Pop&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic+Coding&family=Nanum+Myeongjo&family=Playwrite+AU+TAS:wght@100..400&family=Playwrite+IT+Moderna:wght@100..400&family=Playwrite+RO:wght@100..400&family=Rubik+Glitch+Pop&display=swap" rel="stylesheet">
    
    <!-- Link logo icon -->
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">

     <!-- CSS -->
     @vite(['resources/css/Home.css'])

</head>
<body>
    <!-- HOME SECTION -->
    
    @include('Home.layout.menu')

    <!-- Hero Section -->
    @include('Home.layout.hero')

    <!-- Designs Section -->
    @include('Home.layout.design')

    <!-- Bottom Content Section -->
    @include('Home.layout.about')

    <!-- Footer Section -->
    @include('Home.layout.footer')
      
    <!-- Icon Scripts -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Bootstrap JS -->
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
                @include('Home.lang.menu')

                // lang Home\lang\hero
                @include('Home.lang.hero')

                // lang Home\lang\design
                @include('Home.lang.design')

                // lang Home\lang\about
                @include('Home.lang.about')

                // lang Home\lang\footer
                @include('Home.lang.footer')
            })
            .catch(error => console.error('Error loading language file:', error));
        }
    </script>

</body>
</html>
