@extends('frontend.layouts.app')

@section('title', 'request')

@section('content')
	<div class="container py-4">
		<div class="row justify-conent-center">
			<div class="col-md-12">
				<x-frontend.card>
					<x-slot name="header">
						@lang('My Account')
						<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
					</x-slot>

					<x-slot name="body">
						<table>
							<tr>
								<td>Id</td>
								<td>Matricula</td>
								<td>Marca</td>
								<td>Modelo</td>
								<td>Polo</td>
								<td>Categoria da Carta</td>
								<td>Está requisitado?</td>
								<td>Requisitar</td>
							</tr>
							@foreach ($viaturas as $viatura)
								<tr>
									<td>{{ $viatura->id }}</td>
									<td>{{ $viatura->matricula }}</td>
									<td>{{ $viatura->marca }}</td>
									<td>{{ $viatura->modelo }}</td>
									<td>{{ $viatura->polo->designacao }}</td>
									<td>{{ $viatura->categoria->categoria }}</td>
									@if ($viatura->requisited == 1)
										<td>Sim</td>
									@else
										<td>Não</td>
									@endif
									<td>
										@if ($viatura->requested == 1)
											<label color="gray">requisitar</label>
										@else
											<x-utils.link
												text="requisitar"
												class="nav-link active"
												data-toggle="pill"
												href="#"
												role="tab" />
										@endif
									</td>
								</tr>
							@endforeach
						</table>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
