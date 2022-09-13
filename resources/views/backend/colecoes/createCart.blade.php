@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.editCarta')

@section ('content')

	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			<h2>Adicionar um tipo de carta...</h2><br><br>

			<form method="POST">
				@csrf
				<label for="id">Id: </label>
				<input name="id" placeholder="{{ $userinf->id }}" readonly="readonly"><br><br>

				<label for="catCarta">Categoria da carta: </label>
				<input list="categorias" name="catCarta">
				<datalist id="categorias">
					@foreach ($catCartas as $catCarta)
						<option value="{{ $catCarta->categoria }}">
					@endforeach
				</datalist><br><br>

				<label for="validity">Validade: </label>
				<input type="datetime-local" name="validity"><br><br>

				<button type="submit">Aplicar...</button>
			</form>
		</x-slot>
	</x-backend.card>

@endsection
