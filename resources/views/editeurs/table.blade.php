<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="editeurs-table">
            <thead>
            <tr>
                <th>Maisonedit</th>
                <th>Siteweb</th>
                <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($editeurs as $editeur)
                <tr>
                    <td>{{ $editeur->maisonedit }}</td>
                    <td>{{ $editeur->siteweb }}</td>
                    <td>{{ $editeur->email }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['editeurs.destroy', $editeur->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('editeurs.show', [$editeur->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('editeurs.edit', [$editeur->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $editeurs])
        </div>
    </div>
</div>
