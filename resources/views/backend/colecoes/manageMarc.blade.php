@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.editCarta')

@section ('content')
	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			<h2>informações sobre a marcação</h2>

			<form method="POST">
				@csrf
				<label for="id">Id da requisição: </label>
				<input name="id" placeholder="{{ $marcacao->id }}" readonly="readonly"><br><br>
				<label for="user_id">Id do utilizador: </label>
				<input name="user_id" placeholder="{{ $marcacao->user_id }}" readonly="readonly"><br><br>
				<label for="poloLevantar">Polo a levantar: </label>
				<input name="poloLevantar" placeholder="{{ $marcacao->poloL->designacao }}"><br><br>
				<label for="dataHora_levantar">Data e hora para levantar: </label>
				@if ($marcacao->dataHora_levantar < $today)
					<input name="dataHora_levantar" placeholder="{{ $marcacao->dataHora_levantar }}" readonly="readonly">
				@else
					<input name="dataHora_levantar" placeholder="{{ $marcacao->dataHora_levantar }}">
				@endif
				<br><br>
			</form>
		</x-slot>
	</x-backend.card>
@endsection
