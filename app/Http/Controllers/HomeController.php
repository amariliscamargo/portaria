<?php

namespace portaria\Http\Controllers;

use Illuminate\Http\Request;

use portaria\Http\Requests;
use portaria\Http\Controllers\Controller;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipoUsuario = \Auth::user()->tipoUsuario;
		// dd($tipoUsuario);
		switch ($tipoUsuario) {

			case 'A': //ADMINISTRADOR
			return redirect()->action('CondominioController@index');
			break;

			case 'F': //FUNCIONÁRIO
			return redirect()->action('VisitaController@index');
			break;

			case 'M': //MORADOR
			return redirect()->action('UnidadeController@show');
			break;
			
			default:
			return view('home');
			break;
		}
	}

}
