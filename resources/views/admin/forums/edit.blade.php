<h1>Dúvida {{ $forum->id }}</h1>

<x-alert/>



<form action="{{ route('forum.update', $forum->id) }}" method="POST">
    @method('PUT')
    @include('admin.forums.partials.form', ['forum' => $forum])
</form>
