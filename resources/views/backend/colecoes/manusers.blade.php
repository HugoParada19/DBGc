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
						<td rowspan="{{ $informacao->numCats * 2 }}">>{{ $informacao->role }}</td>
						@for ($i = 1; $i <= $informacao->numCats; $i++)
							@foreach ($subinformacoes as $subinformacao)
								@if ($subinformacao->userinf_id == $informacao->id)
										<td>{{ $subinformacao->catCarta_id }}</td>
									</tr>
									<tr><td>{{ $subinformacao->validity }}</td></tr>
								@endif
							@endforeach
							@if ($i != $informacao->numCats)
								<tr>
							@endif
						@endfor
						<a href="{{ URL('colecoes/manage/manageUsers/' . $informacao->id . '/modify') }}">modify it</a>
					</tr>
				@endforeach
			</table>
		</x-slot>
	</x-backend.card>
@endsection
