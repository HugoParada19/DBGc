@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.manMarcs')

@section ('content')
	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		<x-slot name="body">
			<h2>Escolha a marcação do qual deseja gerir.</h2>
			<table>
				<tr>
					<td>Id</td>
					<td>Id do utilizador</td>
					<td>Polo detinado a levantar</td>
					<td>Data/Hora destinada a levantar</td>
					<td>Data/Hora destinada a entrega</td>
					<td>Objetivo</td>
					<td>Id da viatura</td>
					<td>Polo de entrega</td>
					<td colspan="3">Ações</td>
				</tr>
				@foreach ($marcacaos as $marcacao)
					<tr>
						<td>{{ $marcacao->id }}</td>
						<td>{{ $marcacao->user_id }}</td>
						<td>{{ $marcacao->poloL->designacao }}</td>
						<td>{{ $marcacao->dataHora_levantar }}</td>
						<td>{{ $marcacao->dataHora_entrega }}</td>
						<td>{{ $marcacao->objetivo }}</td>
						<td>{{ $marcacao->viatura_id }}</td>
						<td>{{ $marcacao->poloE->designacao }}</td>
						<td><a href="{{ URL('admin/colecoes/manage/manageMarcacaos/' . $marcacao->id . '/finish') }}">Concluir</a></td>
						<td><a href="{{ URL('admin/colecoes/manage/manageMarcacaos/' . $marcacao->id . '/destroy') }}">Cancelar</a></td>
						<td><a href="{{ URL('admin/colecoes/manage/manageMarcacaos/' . $marcacao->id . '/manage') }}">Editar</a></td>
					</tr>
				@endforeach
			</table>
		</x-slot>
	</x-backend.card>
@endsection
