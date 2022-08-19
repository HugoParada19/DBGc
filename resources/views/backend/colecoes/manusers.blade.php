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
					<td>Id da informação</td>
					<td>Id do utilizador</td>
					<td>Polo pertencente</td>
					<td>Cargo</td>
					<td colspan="2">Miscelanias</td>
					<td>Modificar</td>
				</tr>
				@foreach ($informacoes as $informacao)
					<tr>
						<td rowspan="{{ $informacao->numCats * 2 }}">{{ $informacao->id }}</td>
						<td rowspan="{{ $informacao->numCats * 2 }}">{{ $informacao->user_id }}</td>
						<td rowspan="{{ $informacao->numCats * 2 }}">{{ $informacao->polo->designacao }}</td>
						@if ($informacao->numCats > 0)
							<td rowspan="{{ $informacao->numCats * 2 }}">{{ $informacao->role }}</td>
							@for ($i = 1; $i <= $informacao->numCats; $i++)
								@php ($ln = 1)
								@foreach ($subinformacoes as $subinformacao)
									@if ($subinformacao->userinf_id == $informacao->id)
										@if ($ln == $i)
												<td>Categoria da carta:</td>
												<td>{{ $subinformacao->categoria->categoria }}</td>
												@if ($i == 1)
													<td rowspan="{{ $informacao->numCats * 2 }}"><a href="{{ URL('colecoes/manage/manageUsers/' . $informacao->id . '/modify') }}">modify it</a></td>
												@endif
											</tr>
											<tr>
												<td>Validade:</td>
												<td>{{ $subinformacao->validity }}</td></tr>
											@break
										@else
											@php ($ln += 1)
										@endif
									@endif
								@endforeach
								@if ($i != $informacao->numCats)
									<tr>
								@endif
							@endfor
						@else
							<td colspan="2">{{ $informacao->role }}</td>
						@endif
					</tr>
				@endforeach
			</table>
		</x-slot>
	</x-backend.card>
@endsection
