@extends('backend.layouts.app')

@section('title', 'colecoes')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
			<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
		</x-slot>

		<x-slot name="body">
			Escolha o que queira aceder<br><br>
			<ul>
				<x-utils.link
					class="card-header-action"
					:href="route('admin.colecoes.polos')"
					text="Polos" />
				<x-utils.link
					class="card-header-action"
					:href="route('admin.colecoes.categorias')"
					text="Categorias da conta" />
				<x-utils.link 
					class="card-header-action"
					href="#"
					text="Viaturas" />
			</ul>
		</x-slot>
	</x-backend.card>
@endsection
