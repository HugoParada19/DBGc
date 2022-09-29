@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.editCarta')

@section ('content')
	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			<h2>Introduza as informações de acordo com os documentos apresentados.</h2>

			<form method="POST">
				@csrf
				<label for="marcacao_id">Id da marcação: </label>
				<input placeholder="{{ $marcacao->id }}" readonly="readonly"><br><br>
				<label for="dataHora_levantar">Data & Hora de levantamento: </label>
				<input placeholder="{{ $marcacao->dataHora_levantar }}" readonly="readonly"><br><br>
				<label for="dataHora_entrega">Data & Hora em que o veículo foi entregue: </label>
				<input type="datetime-local" name="dataHora_entrega"><br><br>
				<label for="kmAntes">Kilometros antes do veículo ter sido requisitado: </label>
				<input name="kmAntes"><br><br>
				<label for="kmDepois">Kilometros depois do veículo ter sido entregue: </label>
				<input name="kmDepois"><br><br>
				<label for="notas">Qualquer tipo de informação a mais: </label>
				<textarea name="notas"></textarea><br><br>
				<label for="objetivo">Objetivo: </label>
				<input placeholder="{{ $marcacao->objetivo }}" readonly="readonly"><br><br>

				<button type="submit">Submeter</button>
			</form>
		</x-slot>
	</x-backend.card>
@endsection
