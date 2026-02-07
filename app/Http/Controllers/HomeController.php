<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovel;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Auth\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$imoveis = Imovel::orderBy('id', 'DESC')->take(4)->get();
		
		$oportunidades = Imovel::orderBy('id', 'DESC')->take(6)->get();
	
		
        return view('index', compact('imoveis', 'oportunidades'));
    }
	
	public function sobre()
    {
        return view('sobre');
    }
	
	public function contactos()
    {
        return view('contactos');
    }
	
	public function enviar_contacto(Request $request)
    {

		$this->validate($request, [
				'nome' => 'required',
				'email' => 'required|email',
				'mensagem' => 'required'
			]);
			
		$data = array(
            'nome' => $request->nome,
            'mensagem' => $request->mensagem,
			'email' => $request->email,
			'assunto' => $request->assunto,
			'tipo_contacto' => $request->tipo_contacto,
			'endereco_imovel' => $request->endereco_imovel
        );	
		
		Mail::to('mborgesimobiliaria@gmail.com')->send(new ContactMail($data));
			   
			
		return back()->with('email-success', true);
	}
}
