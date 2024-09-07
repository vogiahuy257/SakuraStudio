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
                    <label for="excelInput" class="form-label">Choose Excel File (.xlsx, .xls)</label>
                    <input type="file" id="excelInput" accept=".xlsx, .xls" class="form-control mb-3">
                    <div class="button d-flex justify-content-end">
                        <button type="button" id="generateAllButton" class="btn">Generate All Cards</button>
                    </div>
                </form>
            </div>
            <div class="progress mt-4">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
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