@extends('layout')

@section('cabecalho')
	Clientes
@endsection

@section('conteudo')

	@if(!empty($mensagem))
	<div class="alert alert-success">
	{{$mensagem}}
	</div>
	@endif

	<form method="post" class="form-inline justify-content-center">
		@csrf
		<div class="form-group mx-sm-3 mb-2">
			<label for="inputPassword2" class="sr-only">Nome do cliente</label>
			<input type="text" class="form-control" placeholder="Cliente" name="nome">
		</div>
		<button type="submit" class="btn btn-primary mb-2">Salvar</button>
	</form>

	<br>

	<ul class="list-group">
	@foreach($clientes as $cliente)
		<li class="list-group-item d-flex justify-content-between align-items-center">{{ $cliente->nome }} <?php echo $cliente->created_at;?> 
			<form method="post" action="/series/remover/{{$cliente->id}}" 
				onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cliente->nome) }}?')"> <!--addslashes função que faz ignorar " ' " no nome-->
				@csrf
				@method("DELETE")
				<button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
			</form>
		</li>
	@endforeach
	</ul>
@endsection