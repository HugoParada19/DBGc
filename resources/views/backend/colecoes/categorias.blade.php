@extends('backend.layouts.app')

@section('title', 'colecoes.categoria')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		<x-slot name="body">
			<h2>Atuais categorias de conta reconhecidas</h2>
			<table>
				<tr>
					<td>Id</td>
					<td>Categoria</td>
				</tr>
			@foreach($categorias as $categoria)
				<tr>
					<td>{{ $categoria->id }}</td>
					<td>{{ $categoria->categoria }}</td>
				</tr>
			@endforeach
			</table>

			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes.viaturas.create')"
				text="Criar" />
			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes')"
				text="Back" />
		</x-slot>
	</x-backend.card>
@endsection