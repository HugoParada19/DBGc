@extends('backend.layouts.app')

@section('title', 'colecoes.manage')

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
					:href="route('admin.colecoes')"
					text="Voltar" />
				<x-utils.link
					class="card-header-action"
					:href="route('admin.colecoes.manage.manusers')"
					text="Gerir utilizadores" />
				<x-utils.link 
					class="card-header-action"
					:href="route('admin.colecoes.manage.manmarcs')"
					text="Gerir marcações" />
			</ul>
		</x-slot>
	</x-backend.card>
@endsection
