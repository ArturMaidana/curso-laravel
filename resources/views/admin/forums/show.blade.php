<h1>Detalhes da dúvida {{ $forum->id }}</h1>

<ul>
    <li>Assunto: {{ $forum->subject }}</li>
    <li>Status: {{ $forum->status }}</li>
    <li>Descrição: {{ $forum->body }}</li>

</ul>

<form action="{{ route('forum.destroy', $forum->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>

</form>
