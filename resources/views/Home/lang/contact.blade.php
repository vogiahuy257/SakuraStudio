                    document.getElementById('textHeaderContact').textContent = data.contact_management;
                    document.getElementById('labelUploadContact').textContent = data.upload_excel_file;
                    document.getElementById('textImportContact').textContent = data.import_excel;
                    document.getElementById('textContactList').textContent = data.contact_list;

                    @if($files->isEmpty())
                       document.getElementById('no-files-available').textContent = data.no_files_available;
                    @else
                    document.querySelectorAll('.file-item').forEach((item, index) => {
                        item.querySelector('.btn-info').innerText = data.show_details;
                        item.querySelector('.btn-dark').innerText = data.delete;
                      });
                    @endif