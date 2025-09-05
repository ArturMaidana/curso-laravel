<h1>Nova Dúvida</h1>

<x-alert/>


<form action="{{ route('forum.store')}}" method="POST">
   @include('admin.forums.partials.form')
</form>
