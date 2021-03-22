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

	<ul class="list-group">

	@foreach($vendas as $venda)
		<li class="list-group-item d-flex justify-content-between align-items-center">{{ $venda->id }} <?php echo $venda->created_at.$venda->valor;?> 
			<form method="post" action="/series/remover/{{$venda->id}}" 
				onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($venda->nome) }}?')"> <!--addslashes função que faz ignorar " ' " no nome-->
				@csrf
				@method("DELETE")
				<button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
			</form>
		</li>
	@endforeach
	{{var_dump($vendas[1])}}

	</ul>


	<div id="accordion">
	  <div class="card">
	    <div class="card-header" id="headingOne">
	      <h5 class="mb-0">
	        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	          Pessoa 1
	        </button>
	      </h5>
	    </div>

	    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
	      <div class="card-body">
	        <table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col"></th>
						<th scope="col">Last</th>
						<th scope="col">Handle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
				</tbody>
			</table>
	      </div>
	    </div>
	  </div>
	  <div class="card">
	    <div class="card-header" id="headingTwo">
	      <h5 class="mb-0">
	        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	          Pessoa 2
	        </button>
	      </h5>
	    </div>
	    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
	      <div class="card-body">
	        <table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col"></th>
						<th scope="col">Last</th>
						<th scope="col">Handle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
				</tbody>
			</table>
	      </div>
	    </div>
	  </div>
	  <div class="card">
	    <div class="card-header" id="headingThree">
	      <h5 class="mb-0">
	        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	          Pessoa 3
	        </button>
	      </h5>
	    </div>
	    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
	      <div class="card-body">
	        <table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col"></th>
						<th scope="col">Last</th>
						<th scope="col">Handle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
				</tbody>
			</table>
	      </div>
	    </div>
	  </div>
	</div>



	

@endsection