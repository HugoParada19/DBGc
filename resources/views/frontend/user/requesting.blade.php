@extends('frontend.layouts.app')

@section('title', 'request')

@section('content')
	<div class="container py-4">
		<div class="row justify-conent-center">
			<div class="col-md-12">
				<x-frontend.card>
					<x-slot name="header">
						@lang('My Account')
					</x-slot>

					<x-slot name="body">
						<h2>Informação:</h2><br><br>
						Matricula: {{ $viatura->matricula }}<br>
						Marca: {{ $viatura->marca }}<br>
						Modelo: {{ $viatura->modelo }}<br>
						Polo presente: {{ $viatura->polo->descricao }}<br>
						Categoria requesitada: {{ $viatura->categoria->categoria }}<br>
						Categoria do utilizador: {{ $user->categorias->categorias->categoria }}
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
