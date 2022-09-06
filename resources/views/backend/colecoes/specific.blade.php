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
				<label for="id">Id: </label>
				<input name="id" placeholder="{{ $userCat->id }}" readonly="readonly"><br><br>

				<label for="categoria">Tipo de categoria de carta: </label>
				<input list="categorias" name="categoria" placeholder="{{ $userCat->categoria->categoria }}">
				<datalist id="categorias">
					@foreach ($categorias as $categoria)
						<option value="{{ $categoria->categoria }}">
					@endforeach
				</datalist>
			</form>
		</x-slot>
	</x-backend.card>

@endsection
