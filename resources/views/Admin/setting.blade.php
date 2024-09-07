<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">   

    {{-- Link logo icon --}}
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">


    <!-- Link style.css -->
    @vite([
    'resources/css/Admin.css',
    'resources/js/Admin/Admin.js',
    'resources/js/Admin/Setting.js'
    ])

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left-side menu -->
            @include('Admin.layout.menu')

            <!-- Main table section in the middle -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                 @include('Admin.layout.setting')
                 
            </main>
            
        </div>
    </div>


    <!-- Bootstrap 5 JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzLFz9eSxC7vvLHgAu7rw1M=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>

    <!-- Link script.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadLanguage('{{ session('locale', 'en') }}');
        });
        function loadLanguage(lang) {
     fetch(`/js/lang/${lang}.json`)
         .then(response => response.json())
         .then(data => {
             document.getElementById('settingHeaderText').textContent = data.setting;
            document.getElementById('settingText').textContent = data.setting;
            document.getElementById('dashboardText').textContent = data.dashboard;
            
            document.getElementById('roleTextAdmin').textContent = '@'+data.administrator;
         })
         .catch(error => console.error('Error loading language file:', error));
 }
    </script>
</body>
</html>
