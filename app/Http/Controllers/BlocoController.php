<?php

namespace portaria\Http\Controllers;

use portaria\Http\Requests;
use portaria\Http\Controllers\Controller;

class BlocoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($condominio_id)
    {
        $condominio = \portaria\Condominio::find($condominio_id);
        $rows = \portaria\Bloco::where('condominio_id', $condominio_id)->paginate(10);

        return view('bloco.index')->with(compact('condominio', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($condominio_id)
    {
        $row = new \portaria\Bloco();
        $row->condominio_id = $condominio_id;

        return view('bloco.create')->with(compact('row'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(\Request $request)
    {
        $row = \portaria\Bloco::create($request::all());

        return redirect()->route('admin.bloco.index', [$row->condominio_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $row = \portaria\Bloco::find($id);

        return view('bloco.edit')->with(compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(\Request $request, $id)
    {
        $row = \portaria\Bloco::find($id);
        $row->update($request::all());

        return redirect()->route('admin.bloco.index', [$row->condominio_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        \portaria\Bloco::destroy($id);

        return back();
    }

    /**
     * Pesquisa os registros de blocos sem necessidade de login no sistema
     * 
     * @return Response
     */
    public function getFromCondominio()
    {
        $condominio_id = \Request::input('option');

        return  \portaria\Bloco::where('condominio_id', $condominio_id)->lists('id','numero');
    }

}
