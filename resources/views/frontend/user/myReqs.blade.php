@extends ('frontend.layouts.app')

@section ('title', 'request')

@section ('content')
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<x-frontend.card>
					<x-slot name="header">
						@lang ('My Account')
						<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
					</x-slot>

					<x-slot name="body">
						<h2>Tabelas relacionadas à sua conta</h2><br><br>

						<table>
							<tr>
								<td>Id</td>
								<td>Polo a levantar</td>
								<td>Data e hora de requisição</td>
								<td>Data e hora de entrega</td>
								<td>Objetivo</td>
								<td>Matricula da viatura</td>
								<td>Polo a entregar</td>
								<td>Editar</td>
								<td>Cancelar</td>
							</tr>
							@foreach ($marcacoes as $marcacao)
								<tr>
									<td>{{ $marcacao->id }}</td>
									<td>{{ $marcacao->polo->designacao }}</td>
									<td>{{ $marcacao->dataHora_levantar }}</td>
									<td>{{ $marcacao->dataHora_entrega }}</td>
									<td>{{ $marcacao->objetivo }}</td>
									<td>{{ $marcacao->viatura->matricula }}</td>
									<td>{{ $marcacao->polo->designacao }}</td>
									<td><a href="{{ URL('vehicules/requisitions/{id}/edit') }}">Editar</a></td>
									<td><a href="{{ URL('vehicules/requisitions/{id}/cancel') }}">Cancelar</a></td>
								</tr>
							@endforeach
						</table>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
