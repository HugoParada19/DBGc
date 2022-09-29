@extends ('frontend.layouts.app')

@section ('title', 'request')

@section ('content')
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<x-frontend.card>
					<x-slot name="header">
						@lang ('My Account')
					</x-slot>

					<x-slot name="body">
						<h2>Editar conteudo</h2>

						<form method="POST">
							@csrf
							<label for="id">Id: </label>
							<input name="id" value="{{ $marcacao->id }}" readonly="readonly"><br>
							<label for="dataHora_levantar">Data e hora de levantamento</label>
							@if ($dataChangable)
							<input name="dataHora_levantar" value="{{ $marcacao->dataHora_levantar }}"><br>
							@else
							<input name="dataHora_levantar" value="{{ $marcacao->dataHora_levantar }}" readonly="readonly"><br>
							@endif
							<label for="dataHora_entrega">Data e hora de entrega</label>
							<input name="dataHora_entrega" value="{{ $marcacao->dataHora_entrega }}"><br>

							<label for="objetivo">Objetivo: </label>
							<input name="objetivo" value="{{ $marcacao->objetivo }}"><br>

							<label for="viatura">Veículo escolhido</label>
							<input list="viats" name="viatura" placeholder="{{ $marcacao->viatura->matricula }}">
							<datalist id="viats">
								@foreach ($viaturas as $viatura)
									<option value="{{ $viatura->matricula }}">
								@endforeach
							</datalist>
							<br> <strong>Nota: </strong> Em caso de este campo estiver vazio, nenhuma mudança será aplicada...<br>

							<label for="polo">Polo escolhido: </label>
							<input id="polos" name="polo" placeholder="{{ $marcacao->poloE->designacao }}">
							<datalist>
								@foreach ($polos as $polo)
									<option value="{{ $polo->designacao }}">
								@endforeach
							</datalist><br>

							<button type="submit">Aplicar</button>
						</form>
					</x-slot>
				</x-frontend.card>
			</div>
		</div>
	</div>
@endsection
