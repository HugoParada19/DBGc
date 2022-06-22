@extends('backend.layouts.app')

@section('title', 'colecoes.polos.create')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			<form method="POST">
				@csrf
				<label for="designacao">Introduza a designação do polo:</label><br>
				<input type="text" name="designacao"><br><br>
				<input type="submit">
			</form>
			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes.polos')"
				text="Back" />
		</x-slot>
	</x-backend.card>
@endsection
