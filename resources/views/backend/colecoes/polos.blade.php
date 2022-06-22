@extends('backend.layouts.app')

@section('title', 'colecoes.polos')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
			<script src="{{ asset('js/main.js') }}"></script>
		</x-slot>

		<x-slot name="body">
		@if($requested)
				<body onload="changeURL('admin/colecoes/polos')">
		@elseif($iCanExist)
				<body onload="iCanExist('admin/colecoes/polos')">
		@endif
			<h2>Todos os polos registrados atuais.</h2>
			<table>
				<tr>
					<td>Id</td>
					<td>Designação</td>
				</tr>
				@foreach($polos as $polo)
				<tr>
					<td>{{ $polo->id }}</td>
					<td>{{ $polo->designacao }}</td>
					<td><a href="{{ URL('admin/colecoes/polos/' . $polo->id . '/destroy') }}">Eliminar</a></td>
				</tr>
				@endforeach
			</table>
			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes.polos.create')"
				text="Criar" />
			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes')"
				text="Back" />
		</x-slot>
		@if($requested || $iCanExist)
			</body>
		@endif
	</x-backend.card>
@endsection
