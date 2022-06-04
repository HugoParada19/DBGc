@extends('backend.layouts.app')

@section('title', 'colecoes.viaturas')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		@if($requested)
			<x-slot name="body"
				onload="changeURL('admin/colecoes/viaturas')" />
		@else
			<x-slot name="body">
		@endif
			<h2>Atuais viaturas presentes na base de dados</h2>
			<table>
				<tr>
					<td>Id</td>
					<td>Matricula</td>
					<td>Marca</td>
					<td>Modelo</td>
					<td>Pertence ao polo</td>
					<td>Permitido ao tipo de conta</td>
					<td>Criado a</td>
				</tr>
				@foreach($viaturas as $viatura)
					<tr>
						<td>{{ $viatura->id }}</td>
						<td>{{ $viatura->matricula }}</td>
						<td>{{ $viatura->marca }}</td>
						<td>{{ $viatura->polos_id }}</td>
						<td>{{ $viatura->catConta_id }}</td>
						<td>{{ $viatura->timestamps }}</td>
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
				text="Voltar" />
		</x-slot>
	</x-backend.card>
@endsection
