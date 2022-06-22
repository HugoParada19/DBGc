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
						<x-utils.link
							text="Option 1"
							class="nav-link active"
							data-toggle="pill"
							href="#"
							role="tab" />
						<x-utils.link
							text="Option 2"
							class="nav-link active"
							data-toggle="pill"
							href="#"
							role="tab" />
						<x-utils.link
							text="Option 3"
							class="nav-link active"
							data-toggle="pill"
							href="#"
							role="tab" />

					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
