@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.editcarta')

@section ('content')

	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			<h2>Carta atual</h2>

			<form method="POST">
				@csrf
				<label for="id">Id atual da carta:</label>
				<input name="id" placeholder="{{ $userinf->id }}" readonly="readonly"><br><br>
				<label for="userinf_id">Esta carta será lançada para o utilizador correspondente ao id: </label>
				<input name="userinf_id" placeholder="{{ $userinf_id->userinf_id }}" readonly="readonly"><br><br>

				<label for="catCarta">Tipo de carta: </label>
				<input list="categorias" name="categoria" placeholder="{{ $userinf->categoria }}">
				<datalist id="categorias">
					@foreach ($catCartas as $catCarta)
						<option value="{{ $catCarta->designacao }}">
					@endforeach
				</datalist><br><br>

				<label for="validity">Validade: </label>
				<input type="datetime-local" name="validity"><br><br>

				<button type="submit">Submeter...</button>
			</form>
		</x-slot>
	</x-backend.card>

@endsection
