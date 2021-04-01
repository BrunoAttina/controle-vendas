<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;

class VendasController extends Controller
{
	public function index(Request $request){
		$mensagem = $request->session()->get('mensagem');

		$clientes = Cliente::query()->orderBy('nome')->get();
		$produtos = Produto::query()->orderBy('nome')->get();
		$vendas = Venda::query()->orderBy('nome')->get();
		

		return view('vendas.index', compact('mensagem', 'clientes', 'produtos', 'vendas'));
	}

	public function storeVendas(Request $request)
	{
		$cliente = $request->cliente;
		$produto = $request->produto;
		$qtd = $request->qtd;
		$valor = $request->valor;
		
		$vendas = new Venda();
		$vendas->fkCliente = $cliente;
		$vendas->fkProduto = $produto;
		$vendas->qtd = $qtd;
		$vendas->valor = $valor;
		$vendas->save();

		$request->session()->flash('mensagem',"Venda {$vendas->id} criada com sucesso {$vendas->nome}");

		return redirect()->route('vendas');
	}

	public function removerVendas(Request $request)
    {
        Venda::destroy($request->id);
        $request->session()->flash('mensagem',"Série removida com sucesso!");

        return redirect()->route('vendas');
    }









	public function clientes(Request $request){
		$clientes = Cliente::query()->orderBy('nome')->get();
		$mensagem = $request->session()->get('mensagem');

		return view('vendas.clientes', compact('clientes', 'mensagem'));
	}

	public function storeClientes(Request $request)
	{
		$nome = $request->nome;
		$clientes = new Cliente();
		$clientes->nome = $nome;
		$clientes->save();

		$request->session()->flash('mensagem',"Cliente {$clientes->id} criado com sucesso {$clientes->nome}");

		return redirect()->route('clientes');
	}



	public function produtos(Request $request){
		$produtos = Produto::query()->orderBy('nome')->get();
		$mensagem = $request->session()->get('mensagem');

		return view('vendas.produtos', compact('produtos', 'mensagem'));
	}

	public function storeProdutos(Request $request)
	{
		$nome = $request->nome;
		$produtos = new Produto();
		$produtos->nome = $nome;
		$produtos->save();

		$request->session()->flash('mensagem',"Produto {$produtos->id} criado com sucesso {$produtos->nome}");

		return redirect()->route('produtos');
	}
}

?>