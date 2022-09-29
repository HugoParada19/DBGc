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
						<a href="{{ URL('vehicules/request') }}">Requesitar</a><br><br>
						<a href="{{ URL('vehicules/requisitions') }}">Ver veículos requisitados</a><br><br>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
