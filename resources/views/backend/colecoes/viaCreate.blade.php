@extends('backend.layouts.app')

@section('title', 'colecoes.viaturas.create')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		<x-slot name="body">
			<form method="POST">
				@csrf
				<label for="matricula">Matricula do carro</label><br>
				<input type="text" name="matricula"><br><br>
				<label for="marca">Marca do carro:</label><br>
				<input type="text" name="marca"><br><br>
				<label for="modelo">Modelo do carro:</label><br>
				<input type="text" name="modelo"><br><br>
				<label for="catCarta">Categoria da carta:</label><br>
				<input list="cats" name="catCarta_id"><br><br>
				<datalist id="cats">
				@foreach ($categorias as $categoria)
					<option value="{{ $categoria->categoria }}">
				@endforeach
				</datalist>
				<label for="polos_id">Polo pertencente:</label>
				<input list="options" name="polos_id">
				<datalist id="options">
				@foreach($polos as $polo)
					<option value="{{ $polo->designacao }}">
				@endforeach
				</datalist>
				<input type="submit">
			</form>
		</x-slot>
	</x-backend.card>
@endsection
