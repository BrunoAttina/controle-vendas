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

	<h1>Deu Certo</h1>

@endsection