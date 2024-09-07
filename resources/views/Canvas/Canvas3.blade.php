<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas thank you cards 3</title>

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"> 
    <!-- Link logo icon -->
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">

    @vite([
    'resources/css/Canvas.css',
    'resources/js/Canvas/Canvas3.js'
    ])

</head>
<body>

    @include('Home.layout.menu')

    <section id="main" class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="box_canvas mb-4">
                    <canvas id="myCanvas" width="800" height="500"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form_input p-4 shadow">
                    <form id="dataForm">
                         <!-- Input for Excel file -->
                         <div class="mb-3">
                            <label for="excelInput" class="form-label">Choose Excel File (.xlsx, .xls)</label>
                            <input type="file" id="excelInput" accept=".xlsx, .xls" class="form-control">
                        </div>
                        <!-- Input for Avatar image -->
                        <div class="mb-3">
                            <label for="avatarInput" class="form-label">Choose Avatar Image (optional)</label>
                            <input type="file" id="avatarInput" accept="image/*" class="form-control">
                        </div>
                        <!-- Generate All Cards button -->
                        <div class="button d-flex justify-content-end">
                            <button type="button" id="generateAllButton" class="btn">Generate All Cards</button>
                        </div>
                    </form>
                </div>
                <!-- Progress bar -->
                <div class="progress mt-4">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
                <!-- Download All Cards button -->
                <div class="button d-flex justify-content-center mt-3">
                    <button id="printAllButton" class="btn btn-dark">Download All Cards</button>
                </div>
            </div>
        </div>
        <div id="outputContainer" class="User">
            <div id="Name" class="mt-5"></div>
            <div id="Position" class="mt-5"></div>
            <div id="Companyname" class="mt-5"></div>
            <div id="Email" class="mt-5"></div>
        </div>
    </section>

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