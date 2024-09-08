<section id="main" class="container">
    <div class="row mb-5">
        <div class="col-md-8">

            <div class="row shadow customMenuFont">
                <!-- Font Family -->
                <div class="col-md-3">
                    <select {{ $fields !== null ? '' : 'disabled' }} id="fontFamily" class="form-select">
                        <option value="Times New Roman" style="font-family: 'Times New Roman', serif;">Times New Roman</option>
                        <option value="Noto Sans JP" style="font-family: 'Noto Sans JP', sans-serif;">Noto Sans JP</option>
                        <option value="Roboto" style="font-family: 'Roboto', sans-serif;">Roboto</option>
                        <option value="Arial" style="font-family: 'Arial', sans-serif;">Arial</option>
                        <option value="Yu Gothic" style="font-family: 'Yu Gothic', sans-serif;">Yu Gothic</option>
                    </select>
                </div>
    
                <!-- Font Size -->
                <div class="col-md-2">
                    <input {{ $fields !== null ? '' : 'disabled' }} type="number" id="fontSize" class="form-control" placeholder="Font Size" value="25">
                </div>
    
                <!-- Font Color -->
                <div class="col-md-2">
                    <input {{ $fields !== null ? '' : 'disabled' }} type="color" id="fontColor" class="form-control" value="#000000">
                </div>
    
                <div class="toolbar col-md-5">
                    <!-- Bold -->
                    <button {{ $fields !== null ? '' : 'disabled' }} id="boldButton" class="btn btn-icon" title="Bold"><b>Bold</b></button>
            
                    <!-- Italic -->
                    <button {{ $fields !== null ? '' : 'disabled' }} id="italicButton" class="btn btn-icon" title="Italic"><i>Italic</i></button>
                    
                </div>
                
            </div>

            <div class="box_canvas">
                <canvas id="myCanvas" width="800" height="500"></canvas>
            </div>

            <!-- Progress bar -->
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>

            <div class="d-flex justify-content-center align-items-center mb-3">
                 <!-- Download All Cards button -->
                <div class="button me-2">
                    <button {{ $fields !== null ? '' : 'disabled' }} id="printAllButton" class="btn btn-dark">Download All Cards</button>
                </div>
                <!-- Generate All Cards button -->
                <div class="button">
                    <button {{ $fields !== null ? '' : 'disabled' }} type="button" id="generateAllButton" class="btn btn-dark">Generate All Cards</button>
                </div>
            </div>
        </div>


        {{-- tạo thêm form ở đây --}}
        <div class="col-md-4">
            <div class="form_input p-4 shadow">
                <div id="dataForm">
                       
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Contact list -->
                    <div class="mb-3">
                        <label for="Contact" class="form-label">Contact List</label>

                        <form action="{{ route('canvas.getFields', isset($card) ? $card->id : '-1') }}" method="POST">
                             @csrf
                            <select class="form-select" name="file_id" id="contactSelect" onchange="this.form.submit()">
                                <option value="" selected disabled>Select Contact</option>
                                @foreach ($files as $file)
                                    <option value="{{ $file->id }}" {{ $file->id == $fileValue ? 'selected' : '' }} >{{ $file->filename }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                     <!-- Add a div to display the fields -->
                     <div id="fieldsContainer">
                        @if($fields != null)
                            <ul class="list-unstyled mb-0">
                                @foreach($fields as $field)
                                    @if($field->field_name  == 'id')
                                        @continue
                                    @endif
                                    <li class="text-center" draggable="true" data-field-id="{{ $field->id }}">{{ $field->field_name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center text-danger">Please select contact list.</p>
                        @endif
                        <button id="resetAllButton" style="width:100%" class="btn">Reset All</button>
                    </div>
                    
                    <!-- Input for Avatar image -->
                    <div class="mb-3">
                        <label for="bgImageInput" class="form-label">Choose Background Image</label>
                        <input {{ $fields !== null ? '' : 'disabled' }} type="file" id="bgImageInput" accept="image/*" class="form-control">
                    </div>

                    {{-- input text --}}
                    <div id="inputHeader" class="d-flex justify-content-center align-items-center gap-2">
                        <div class="mb-3 flex-grow-1">
                            <label for="newTextInput" class="form-label">Enter Text</label>
                            <textarea {{ $fields !== null ? '' : 'disabled' }} id="newTextInput" class="form-control" placeholder="Enter text here ..." rows="2"></textarea>
                        </div>
                        <div class="mt-3">
                            <button {{ $fields !== null ? '' : 'disabled' }} type="button" id="addTextButton" class="btn btn-dark">Add</button>
                        </div>
                    </div>

                    <div id="textHeader">
                        <ul id="listText" class="list-unstyled mb-0">

                        </ul>
                    </div>
                    
                </div>
            </div>
            
            
        </div>
    </div>

    </div>
</section>
