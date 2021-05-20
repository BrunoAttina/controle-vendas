@extends('layout')

@section('cabecalho')
	Vendas
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
			<select class="form-control" id="exampleFormControlSelect1" placeholder="Teste" name="cliente">
				<option>Selecione o Cliente</option>
				@foreach($clientes as $cliente)
					<option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
				@endforeach
		    </select>
		</div>
		<div class="form-group mx-sm-3 mb-2">
			<select class="form-control" id="exampleFormControlSelect1" name="produto">
				<option>Selecione o Produto</option>
				@foreach($produtos as $produto)
					<option value="{{ $produto->id }}">{{ $produto->nome }}</option>
				@endforeach
		    </select>
		</div>
		<div class="form-group mx-sm-3 mb-2">
			<label for="inputPassword2" class="sr-only">Qtq</label>
			<input type="number" class="form-control" placeholder="Quantidade" name="qtd">
		</div>
		<div class="form-group mx-sm-3 mb-2">
			<label for="inputPassword2" class="sr-only">Valor</label>
			<input type="text" class="form-control" placeholder="Valor" name="valor">
		</div>
		<button type="submit" class="btn btn-primary mb-2">Salvar</button>
	</form>


	<div id="accordion">
	<?php $contagem = 0;?>
	@foreach($clientes as $cliente)
	<?php $contagem++;?>
	<?php $valorTotal = 0;?>
	  <div class="card">
	    <div class="card-header" id="heading{{$contagem}}">
	      <h5 class="mb-0">
	        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$contagem}}" aria-expanded="false" aria-controls="collapse{{$contagem}}">
	        	{{$cliente->nome}}
	        </button>
	      </h5>
	    </div>

	    <div id="collapse{{$contagem}}" class="collapse" aria-labelledby="heading{{$contagem}}" data-parent="#accordion">      
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Feita em:</th>
							<th scope="col">Produto</th>
							<th scope="col">Quantidade</th>
							<th scope="col">Valor</th>
							<th scope="col">Pagto</th>
							<th scope="col"></th>

						</tr>
					</thead>
					<tbody>
						@foreach($vendas as $venda)
							@if($venda->fkCliente == $cliente->id)
							<tr>
								<td>{{$venda->created_at}}</td>
								@foreach($produtos as $produto)
									@if($venda->fkProduto == $produto->id)
										<td>{{$produto->nome}}</td>
									@endif
								@endforeach
								<td>{{$venda->qtd}}</td>
								<td>{{$valor = (float) $venda->valor}}</td>
								<?php $valorTotal += $valor;?>
								<td>
									@if($venda->pagto == '')
										<form method="post" action="/updatePagto/{{$venda->id}}" class="form-inline">
											@csrf
											@method("PUT")
											<input type="text" class="form-control" placeholder="" name="pagto">
											<button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
										</form>
									@endif
									@if($venda->pagto != '')
										{{$venda->pagto}}
									@endif
								</td>
								<td>
									<form method="post" action="/remover/{{$venda->id}}" 
										onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($venda->nome) }}?')"> <!--addslashes função que faz ignorar " ' " no nome-->
										@csrf
										@method("DELETE")
										<button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
									</form>
								</td>
							</tr>
							@endif
						@endforeach
							<tr>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col">Valor total: R$ {{$valorTotal}}</th>
								<th scope="col"></th>
							</tr>
					</tbody>
				</table>
			</div>
	    </div>
	  </div>
	@endforeach  
	</div>



	

@endsection