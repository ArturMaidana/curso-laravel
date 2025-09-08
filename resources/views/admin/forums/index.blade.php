<h1>Listagems dos supports</h1>

<a href="{{ route('forum.create')}}">Criar Dúvida</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($forums->items() as $forum)
            <tr>
                <td>{{ $forum->subject }} </td>
                <td>{{ getStatusForum($forum->status) }} </td>
                <td>{{ $forum->body }} </td>
                <td>
                    <a href="{{ route('forum.show', $forum->id) }}">Ver</a>
                    <a href="{{ route('forum.edit', $forum->id) }}">Editar</a>

                </td>
            </tr>
        @endforeach
    </thbody>
</table>

<x-pagination :paginator="$forums" :appends="$filters" />
