<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dccomic;
use Illuminate\Http\Request;

class DccomicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ritorna la view con tutti gli elementi
        $dccomics = Dccomic::all();
        return view('dccomics.index', compact('dccomics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dccomics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $dccomic = new Dccomic();
        $dccomic->fill($form_data);
        $dccomic->save();

        // pattern post-redirect-get
        // perchè non ritorno la view? perchè la chiamata post non fa visualizzare
        return redirect()->route('dccomics.show', ['dccomic' => $dccomic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dccomic = Dccomic::findOrFail($id);
        return view('dccomics.show', compact('dccomic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dccomic = Dccomic::findOrFail($id);
        return view('dccomics.edit', compact('dccomic'));
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
        $form_data = $request->all();
        $dccomic = Dccomic::findOrFail($id);
        $dccomic->update($form_data);
        // dd($dccomic);
        return redirect()->route('dccomics.show', ['dccomic' => $dccomic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
