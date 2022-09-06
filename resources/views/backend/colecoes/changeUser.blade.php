@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.changeuser')

@section ('content')
	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		<x-slot name="body">
			<h2>Index</h2>

			<form method="POST">
				@csrf
				<label for="id">Id:</label>
				<input name="id" placeholder="{{ $informacao->id }}" readonly="readonly"><br><br>
				<label for="polo_id">{{ $informacao->polo_id }}</label>
				<input list="polos" name="polo_id">
				<datalist id="polos">
					@foreach ($polos as $polo)
						<option value="{{ $polo->designacao }}"></option>
					@endforeach
				</datalist>
				<label for="role">Cargo: </label>
				<input name="role" placeholder="{{ $informacao->role }}"><br><br>
				<label name="numCats" color ="white">{{ $informacao->numCats }}</label><br><br>

				<table>
								<tr>
									<td>Nº da categoria</td>
									<td>Nome da categoria</td>
									<td>Modificar</td>
									<td>Apagaar</td>
								</tr>
				@for ($i = 1; $i <= $informacao->numCats; $i++)
					@php ($ln=1)
					@foreach($subinformacoes as $subinformacao)
						@if($ln == $i)
							
								<tr>
									<td>{{ $subinformacao->categoria->id }}</td>
									<td>{{ $subinformacao->categoria->categoria }}</td>
									<td><a href="{{ URL('admin/colecoes/manage/manageUsers/' . $informacao->id . '/modify/' . $informacao->categoria . '/edit') }}">Modificar</a></td>
									<td><a href="{{ URL('admin/colecoes/manage/manageUsers/' . $informacao->id . '/modify/' . $informacao->categoria . '/destroy') }}">Destruir</a></td>
								</tr>
							@break
						@else
							@php ($ln += 1)
						@endif
					@endforeach
				@endfor
				</table>
				<br><br>

				<button type="submit">Submeter mudanças...</button>
			</form>
		</x-slot>
	</x-backend.card>
@endsection
