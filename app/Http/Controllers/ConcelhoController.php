<?php

namespace App\Http\Controllers;

use App\Concelho;
use Illuminate\Http\Request;

class ConcelhoController extends Controller
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
     * @param  \App\Concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function show(Concelho $concelho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function edit(Concelho $concelho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concelho $concelho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concelho  $concelho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concelho $concelho)
    {
        //
    }
	
	public function obterLocalidades(Concelho $concelho)
    {
        return $concelho->localidades()->select('id', 'nome_localidade')->get();
    }
}
