@extends('backend.layouts.app')

@section('title', 'polos')

@section('content')
	<x-backend.card>
		<x-slot name="header">
			@lang('Welcome :Name', ['name' => $logged_in_user->name])
		</x-slot>

		<x-slot name="body">
			Atual base de dados das viaturas<br><br>
			<x-slot name="table">
				<x-slot name="th">
					<x-slot name="td">Id</x-slot>
					<x-slot name="td">Designação</x-slot>
				</x-slot>
				@foreach($polos as $polo)
				<x-slot name="tb">
					<x-slot name="td">{{ $polo->id }}</x-slot>
					<x-slot name="td">{{ $polo->designacao }}</x-slot>
				</x-slot>
				@endforeach
			</x-slot>
			<x-utils.link
				class="card-header-action"
				:href="route('admin.colecoes.index')"
				text="Back"
		</x-slot>
	</x-backend.card>
