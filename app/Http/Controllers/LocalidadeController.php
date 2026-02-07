<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Distrito;
use App\Concelho;
use Illuminate\Http\Request;

class LocalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localidade  $localidade
     * @return \Illuminate\Http\Response
     */
    public function show(Localidade $localidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localidade  $localidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Localidade $localidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localidade  $localidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localidade $localidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localidade  $localidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localidade $localidade)
    {
        //
    }
	
	public function obterCodigosPostais(Localidade $localidade)
    {
		return $localidade->codigos_postais()->orderBy('desig_postal', 'asc')->get();
    }
}
