@extends('backend.layouts.app')

@section('title', 'colecoes.categorias.create')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		<x-slot name="body">
			<form method="POST">
				@csrf
				<label for="categoria">Introduza a categorias:</label><br><br>
				<input type="text" name="categoria"><br><br>
				<input type="submit"><br><br>
			</form>
			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes.categorias')"
				text="Back" />
		</x-slot>
	</x-backend.card>
@endsection
