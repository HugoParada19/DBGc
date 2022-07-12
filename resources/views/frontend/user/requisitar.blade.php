@extends('frontend.layouts.app')

@section('title', 'vehicules')

@section('content')
	<div class="container py-4">
		<div class="row justify-conent-center">
			<div class="col-md-12">
				<x-frontend.card>
					<x-slot name="header">
						@lang('My Account')
					</x-slot>

					<x-slot name="body">
						<form method="POST">
						@csrf
						Id: <label name="id">{{ $marcar->id }}</label><br>
						insira os kilometros da viatura antes de ser requisitada: <input name="kmAntes"><br>
						insira os kilometros depois da requisicao (se ter acabado de requisitar esta viatura, pode deixar este ponto a branco): <input name="kmDepois"><br>
						Quaisquer notas, devem ser inseridas antes da re	quisicao: <textarea name="notas"></textarea><br>
						<input type="submit">
						</form>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
