@extends('layouts.app')

@section('content')

<div class="container">
	Nome: {{ $event->name }}
	</br>
	Data: {{ $event->date }}
	</br>
	Horário: {{ $event->start_time }}
	</br></br>

	<a href="/{{ $user->username }}/event/{{ $event->id }}/edit">
		<button class="btn btn-primary">Reagendar</button>
	</a>

	<form action="/{{ $user->username }}/event/{{ $event->id }}" enctype="multipart/form-data" method="post">
		@csrf
		@method('DELETE')
		
		<a class="pt-5">
			<button class="btn btn-primary">Deletar</button>
		</a>
	</form>

</div>

@endsection