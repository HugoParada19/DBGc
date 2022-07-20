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
						<form method="POST" action="apply">
						@csrf
						Id: <input name="id" value="{{ $viatura->id }}" readonly="readonly"><br>
						Matricula: <input name="matricula" value="{{ $viatura->matricula }}" readonly="readonly"><br>
						Marca: <input readonly="readonly" name="marca" value="{{ $viatura->marca }}"><br>
						Modelo: <input readonly="readonly" name="modelo" value="{{ $viatura->modelo }}"><br>
						Polo presente: {{ $viatura->polo->designacao }}<br>
						Categoria requesitada: {{ $viatura->categoria->categoria }}<br>
						Data de requisição: <input type="datetime-local" name="dataHora_levantar"><br>
						Data de entrega: <input type="datetime-local" name="dataHora_entrega"><br>
						Introduza o seu objetivo: <input name="objetivo"><br>
						Polo de entrega: <input list="cats" name="poloEntrega_id">
						<datalist id="cats">
						@foreach ($polos as $polo)
							<option value="{{ $polo->designacao }}">
						@endforeach
						</datalist>
						@foreach ($userinf[0]->usercats as $usercat)
						@php ($success = false)
						@if ($viatura->categoria->id == $usercat->categoria->id)
							Categoria do utilizador: {{ $usercat->categoria->categoria }} <br>
						@php ($success = true)
						@break
						@endif
						@endforeach
						<br>
						<label for="poloLevantar_id" color="white">{{ $viatura->polo->designacao }}</label>
						<label for="catCarta_id" color="white">{{ $viatura->categoria->categoria }}</label>
						<label for="id">{{ $viatura->id }}</label>
						@if ($success && $viatura->requisited == false)
							<br>
							<button type="submit">requisitar</button>
						@else
							<script>
								alert("Impossivel requisitar este vehiculo devido a incompatibilidades na categoria da carta de condução, ou a viatura está neste momento requesitada.");
								history.back();
							</script>
						@endif
						</form>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
