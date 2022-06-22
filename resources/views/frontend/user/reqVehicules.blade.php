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
									<td>{{ DB::table('polos')->where('id', $viatura->polo_id)->value('designacao') }}</td>
									<td>{{ DB::table('categorias_cartas')->where('id', $viatura->catCarta_id)->value('categoria') }}</td>
									<td>{{ $viatura->requisited }}</td>
									<td><x-utils.link
										text="requisitar"
										class="nav-link active"
										data-toggle="pill"
										@if ($viatura->requested)
											pointer-events="none"
											href="#"
										@else
											href="#"
										@endif
										role="tab" /></td>
								</tr>
							@endforeach
						</table>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
