<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="livres-table">
            <thead>
            <tr>
                <th>Isbn</th>
                <th>Titre</th>
                <th>Annedition</th>
                <th>Prix</th>
                <th>Qtestock</th>
                <th>Couverture</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($livres as $livre)
                <tr>
                    <td>{{ $livre->isbn }}</td>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->annedition }}</td>
                    <td>{{ $livre->prix }}</td>
                    <td>{{ $livre->qtestock }}</td>
                    <td>{{ $livre->couverture }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['livres.destroy', $livre->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('livres.show', [$livre->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('livres.edit', [$livre->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $livres])
        </div>
    </div>
</div>
