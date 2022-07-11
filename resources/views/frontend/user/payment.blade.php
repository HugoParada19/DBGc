@extends('frontend.layouts.app')

@section('title', 'vehicules')

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
						Viatura: {{ $placeholder }}<br><br>

						Custo: {{ $placeholder2 }}<br><br>

						<button href="#" 
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
