<h1>Nova Dúvida</h1>

<form action="{{ route('forum.store')}}" method="POST">
    {{-- <input type="text" value="{{ csrf_token()}}" name="_token" hidden> --}}
    @csrf()
    <input type="text" placeholder="Assunto" name="subject">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>
