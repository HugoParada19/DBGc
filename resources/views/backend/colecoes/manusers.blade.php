@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.manusers')

@section ('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		<x-slot name="body">
			<h2>Escolha a conta do qual deseja modificar.</h2>
			<table>
				<tr>
					<td>Id</td>
					<td>Id do utilizador</td>
					<td>Polo pertencente</td>
					<td>Cargo</td>
					<td>Miscelanias</td>
					<td>Modificar</td>
				</tr>
				@foreach ($informacoes as $informacao)
					<tr>
						<td>{{ $informacao->id }}</td>
						<td>{{ $informacao->user_id }}</td>
						<td>{{ $informacao->polo_id }}</td>
						<td rowspan="{{ sizeof($informacao->id) }}">>{{ $informacao->role }}</td>
						@foreach ($informacao->id as $subinformacao)
							<td>{{ $subinformacao->catCarta_id }}</td>
							<td>{{ $subinformacao->validity }}</td>
						@endforeach
					</tr>
				@endforeach
			</table>
		</x-slot>
	</x-backend.card>
@endsection
