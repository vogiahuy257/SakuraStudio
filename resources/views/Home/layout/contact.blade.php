<section id="contact">
    <div class="container">
        <h1 id="textHeaderContact">Contact Management</h1>
        <div>
            {{-- Display success message if available --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('contact.import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="import-excel" class="form-label" id="labelUploadContact">Upload Excel File</label>
                    <input type="file" name="excel_file" id="import-excel" class="form-control" accept=".xlsx, .xls">
                </div>
                <button type="submit" class="btn btn-primary" id="textImportContact">Import Excel</button>
            </form>
        </div>
        <div id="file-list" class="file-list mt-3">
            <h2 id="textContactList">Contact List</h2>
            @if($files->isEmpty())
                <p id="no-files-available">No files available.</p>
            @else
                @foreach($files as $file)
                    <div class="file-item">
                        <span class="file-name">{{ $file->filename }}</span>
                        <div>
                            <a href="{{ route('contact.details.show', $file->id) }}" class="btn btn-info btn-sm ml-2">Show Details</a>
                            <form action="{{ route('contact.delete', $file->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark btn-sm ml-2 delete-btn">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
