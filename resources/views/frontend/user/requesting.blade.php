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
						<form method="POST" action="reqAction">
						@csrf
						Matricula: <label name="matricula">{{ $viatura->matricula }}</label><br>
						Marca: <label name="marca">{{ $viatura->marca }}</label><br>
						Modelo: <label name="modelo">{{ $viatura->modelo }}</label><br>
						Polo presente: {{ $viatura->polo->descricao }}<br>
						Categoria requesitada: {{ $viatura->categoria->categoria }}<br>
						@foreach ($userinf[0]->usercats as $usercat)
						@php ($success = false)
						@if ($viatura->categoria->id == $usercat->categoria->id)
							Categoria do utilizador: {{ $usercat->categoria->categoria }} <br>
						@php ($success = true)
						@break
						@endif
						@endforeach
						<br>
						<label name="polos_id" color="white">{{ $viatura->polos_id }}</label>
						<label name="catCarta_id" color="white">{{ $viatura->catCarta_id }}</label>
						@if ($success && $viatura->requisited == false)
							<br>
							<x-utils.link
								text="requisitar"
								class="nav-link active"
								data-toggle="pill"
								href="{{ URL('vehicules/request/done') }}" 
								role="tab" />
						@else
							<script>alert("Impossivel requisitar este vehiculo devido a incompatibilidades na categoria da carta de condução, ou a viatura está neste momento requesitada.")</script>
						@endif
						</form>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
