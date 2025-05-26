<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Labels</th>
            @foreach($languages as $language)
            <th> {{$language->name }} </th>
            @endforeach

        </tr>
    </thead>
    <tbody>
        @foreach($paginatedRecords as $record)
        <?php //dd($record); 
        ?>
        <tr>
            <td><button class="btn btn-danger remove_label" data-id="{{ $record['label_id'] }}"><i class="fa fa-trash"></i></button></td>
            <td><input type="text" name="label[]" value="{{ $record['label'] }}" class="form-control input_field" data-id="{{ $record['label_id']  }}" data-type="L" /></td>
            @foreach($record['translations'] as $row)

            <td><input type="text" value="{{ $row['value'] }}" class="form-control input_field" data-id="{{ $row['id']  }}" data-type="T" data-labelid="{{ $record['label_id']  }}" data-languageid="{{ $row['language_id']  }}" /></td>
            @endforeach

        </tr>
        @endforeach
    </tbody>
</table>
{{ $paginatedRecords->withPath(url()->current())->links() }}