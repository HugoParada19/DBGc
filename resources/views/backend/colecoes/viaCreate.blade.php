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
				<label for="polos_id">Polo pertencente</label>
			</form>
		</x-slot>
	</x-backend.card>
@endsection
