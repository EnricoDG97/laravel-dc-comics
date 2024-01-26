<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDccomicRequest;
use App\Http\Requests\UpdateDccomicRequest;
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
    public function store(StoreDccomicRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|min:3|max:50',
        //     'description' => 'nullable',
        //     'thumb' => 'required',
        //     'price' => 'required',
        //     'series' => 'required',
        //     'sale_date' => 'required',
        //     'type' => 'required'
        // ], [
        //     'title.required' => 'Titolo obbligatiorio',
        //     'title.min' => 'Titolo deve avere una lunghezza maggiore di :min caratteri'
        // ]);

        $form_data = $request->validated();
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
        // dd($id);
        return view('dccomics.edit', compact('dccomic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDccomicRequest $request, $id)
    {
        $form_data = $request->validated();
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
        $dccomic = Dccomic::findOrFail($id);
        // dd($dccomic);
        $dccomic->delete();
        return redirect()->route('dccomics.index')->with('message', 'Il DC Comic ' . $dccomic->title . ' è stato eliminato.');
    }
}
