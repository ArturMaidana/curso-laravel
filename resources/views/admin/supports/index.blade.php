<h1>Listagems dos supports</h1>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <thbody>
        @foreach($supports as $support)
            <tr>
                <td>{{ $support->subject }} </td>
                <td>{{ $support->status}} </td>
                <td>{{ $support->body }} </td>
                <td></td>
            </tr>
        @endforeach
    </thbody>
</table>
