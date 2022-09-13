@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.specific')

@section ('content')

	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			<h2>Info da categoria</h2>

			<form method="POST">
				@csrf
				<label for="user_id">Id do utilizador: </label>
				<input name="user_id" placeholder="{{ $user->id }}" readonly="readonly"><br><br>
				<label for="cat_id">Id da categoria: </label>
				<input name="cat_id" placeholder="{{ $usercat->id }}" readonly="readonly"><br><br>

				<label for="categoria">Tipo de categoria de carta: </label>
				<input list="categorias" name="categoria" placeholder="{{ $usercat->categoria->categoria }}">
				<datalist id="categorias">
					@foreach ($categorias as $categoria)
						<option value="{{ $categoria->categoria }}">
					@endforeach
				</datalist><br><br>
				<button type="submit">Submeter</button>
			</form>
		</x-slot>
	</x-backend.card>

@endsection
