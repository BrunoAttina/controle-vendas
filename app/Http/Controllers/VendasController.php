<?php
namespace App\Http\Controllers;

class VendasController extends Controller
{
	public function index(){
		return view('vendas.index');
	}

	public function produtos(){
		return view('vendas.produtos');
	}

	public function clientes(){
		return view('vendas.clientes');
	}
}

?>