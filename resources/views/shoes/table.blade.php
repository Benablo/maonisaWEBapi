<div class="table-responsive">
    <table class="table" id="shoes-table">
        <thead>
            <tr>
                <th>Brand</th>
        <th>Name</th>
        <th>Prize</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shoes as $shoes)
            <tr>
                <td>{{ $shoes->Brand }}</td>
            <td>{{ $shoes->Name }}</td>
            <td>{{ $shoes->Prize }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shoes.destroy', $shoes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shoes.show', [$shoes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shoes.edit', [$shoes->id]) }}" class='btn btn-default btn-xs'>
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
