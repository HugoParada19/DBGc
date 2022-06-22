@extends('backend.layouts.app')

@section('title', 'colecoes.categorias')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
			<script src="{{ asset('js/main.js') }}"></script>
		</x-slot>

		@if($requested)
			<x-slot name="body"
				onload="changeURL('admin/colecoes/categorias')">
		@else
			<x-slot name="body">
		@endif
			<h2>Atuais categorias de carta reconhecidas</h2>
			<table>
				<tr>
					<td>Id</td>
					<td>Categoria</td>
				</tr>
			@foreach($categorias as $categoria)
				<tr>
					<td>{{ $categoria->id }}</td>
					<td>{{ $categoria->categoria }}</td>
					<td><a href="{{ URL('admin/colecoes/categorias/' . $categoria->id . '/destroy') }}">Eliminar</a></td>
				</tr>
			@endforeach
			</table>

			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes.categorias.create')"
				text="Criar" />
			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes')"
				text="Voltar" />
		</x-slot>
	</x-backend.card>
@endsection
