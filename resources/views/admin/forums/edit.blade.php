<h1>Dúvida {{ $forum->id }}</h1>

<form action="{{ route('forum.update', $forum->id) }}" method="POST">
    {{-- <input type="text" value="{{ csrf_token()}}" name="_token" hidden> --}}
    @csrf()
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value="{{ $forum->subject }}">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição">{{ $forum->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
