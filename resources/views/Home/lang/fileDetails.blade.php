
document.getElementById('file-title').innerHTML = `${data.this_is_file} {{ $file->filename }}`;

@if($fields->isEmpty())
document.getElementById('no-fields-available').innerText = data.no_fields_available;
@else
document.querySelectorAll('.no-values-available').forEach(el => 
{
    el.innerText = data.no_values_available;
});
@endif

document.getElementById('back-to-list').innerText = data.back_to_list;

