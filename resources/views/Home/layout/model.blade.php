<div class="custom_model">
    <h1 id="file-title">This is {{ $file->filename }}</h1>
    @if($fields->isEmpty())
        <p id="no-fields-available">No fields available for this file.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach($fields as $field)
                        <th>{{ $field->field_name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($fields as $field)
                        @if(isset($fieldValues[$field->id]) && !empty($fieldValues[$field->id]))
                            <td>
                                @foreach($fieldValues[$field->id] as $value)
                                    <p>{{ $value->value }}</p>
                                @endforeach
                            </td>
                        @else
                            <td class="no-values-available">No values available.</td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>
    @endif

    <!-- Updated route name from 'showContact' to 'contact.show' to match the correct route name -->
    <a href="{{ route('user.contact.show') }}" id="back-to-list" class="btn btn-primary mx-auto">Back to List</a>
</div>
