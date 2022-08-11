@extends ('backend.layouts.app')

@section ('title', 'colecoes.manage.catcreate')

@section ('content')
	<x-backend.card>
		<x-slot name="header">
			@lang ('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			<h2>Index</h2>

			<form method="POST">
				@csrf
				<label for="id">{{ $informacao->id }}</label>
				<input name="id" placeholder="{{ $informacao->id }}" readonly="readonly"><br><br>
				<label for="polo_id">{{ $informacao->polo_id }}</label>
				<input name="polo_id" placeholder="{{ $informacao->polo_id }}"><br><br>
				<label for="role">{{ $informacao->role }}</label>
				<input name="role" placeholder="{{ $informacao->role }}"><br><br>
				@for ($i = 0; $i < $informacao->numCats; $i++)
					
				@endfor
			</form>
		</x-slot>
	</x-backend.card>
@endsection
