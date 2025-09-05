@csrf()
<input type="text" placeholder="Assunto" name="subject" value="{{ $forum->subject ?? old('subject') }}">
<textarea name="body" id="" cols="30" rows="5" placeholder="Descrição">{{ $forum->body ?? old('body') }}</textarea>
<button type="submit">Enviar</button>
