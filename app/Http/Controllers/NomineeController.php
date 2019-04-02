<?php

namespace App\Http\Controllers;

use App\Nominee;
use Illuminate\Http\Request;
use DataTables;

class NomineeController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Nominee();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.nominee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;
        return view('pages.nominee.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'number_id' => 'required|string|unique:nominees,number_id',
            'name' => 'required|string|max:255',
        ]);

        $model = $this->model->create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function show(Nominee $nominee)
    {
        $model = $nominee;
        return view('pages.nominee.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominee $nominee)
    {
        $model = $nominee;
        return view('pages.nominee.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nominee $nominee)
    {
        $this->validate($request, [
            'number_id' => 'required|string|unique:nominees,number_id,' . $nominee->id,
            'name' => 'required|string|max:255',
        ]);

        $nominee->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominee $nominee)
    {
        $nominee->delete();
    }

    /**
     * 
     */
    public function table()
    {
        $model = $this->model->query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('nominee.show', $model->id),
                    'url_edit' => route('nominee.edit', $model->id),
                    'url_destroy' => route('nominee.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
