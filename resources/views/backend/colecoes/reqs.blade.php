@extends('backend.layouts.app')

@section('title', 'colecoes.requisicoes')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
			<script src="{{ asset('js/main.js') }}"></script>
		</x-slot>

		<x-slot name="body">
			<form method="POST">
				@csrf
				<label for="marcacao_id">Id da marcação: </label>
				<input list="marcacoes" name="marcacao_id" onChange="changeThis()" id="marcacao">
				<datalist id="marcacoes">
					@foreach ($marcacoes as $marcacao)
						<option>{"id":"{{ $marcacao->id }}", "objetivo":"{{ $marcacao->objetivo }}", "dataHora_levantar":"{{ $marcacao->dataHora_levantar }}"}</option>
					@endforeach
				</datalist><br>
				<label for="dataHora_levantar">Data e Hora em que foi requisitado o vehiculo:</label>
				<input type="date" name="dataHora_levantar" id="dataHora"><br>
				<label for="dataHora_entrega">Data e Hora em que o vehiculo vai ser entregue: </label>
				<input type="date" name="dataHora_entrega"><br>
				<label for="kmAntes">Kilometros antes de ter sido requesitado</label>
				<input type="text" name="kmAntes"><br>
				<label for="kmDepois">Kilometros depois do vehiculo ter sido requesitado (se este vehiculo ainda não foi entregue, pode deixar este campo em branco)</label>
				<input type="text" name="kmDepois"><br>
				<label for="notas">Quaisquer notas, devem ser colocadas aqui: </label>
				<textarea name="notas"></textarea><br>
				<label for="objetivo">Objetivo nesta requisicao: </label>
				<input type="text" name="objetivo"><br><br>
				<input type="submit">
			</form>
		</x-slot>
	</x-backend.card>
@endsection
