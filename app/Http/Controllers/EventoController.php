<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eventos;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class EventoController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?: 5;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });
        if ($buscar) {
            $eventos = DB::table('eventos')->where('nome', '=', $buscar)->paginate($qtd);
        } else {
            $eventos = DB::table('eventos')->paginate($qtd);
        }
        $eventos = $eventos->appends(Request::capture()->except('page'));
        return view('eventos.index', compact('eventos'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        eventos::find($id)->delete();
        return redirect()->route('eventos.index');
    }

    public function remover($id)
    {
        $eventos = eventos::find($id);

        return view('eventos.remove', compact('eventos'));
    }
}


