@extends ('backend.layouts.app')

@section ('title', 'colecoes.polos.create')

@section ('content')
	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
			<script src="{{ asset('js/main.js') }}"></script>
		</x-slot>

		<x-slot name="body">
			<form method="POST">
				<label for="marcacao_id">Id da marcação: </label>
				<input list="marcacoes" name="marcacao_id">
				<datalist id="marcacoes">
					@foreach ($marcacoes as $marcacao)
						<option value="{{ $marcacao }}" onChange="getMarcInfo({{ $marcacao->id }})">
					@endforeach
				</datalist>
				<label for="dataHora_levantar">Data e Hora em que foi requisitado o vehiculo:</label>
				<input type="datetime-local" name="dataHora_levantar" id="DT" value="">
			</form>
		</x-slot>
	</x-backend.card>
@endsection
