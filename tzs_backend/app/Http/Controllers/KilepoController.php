<?php

namespace App\Http\Controllers;

use App\Models\Kilepo;
use Illuminate\Http\Request;

class KilepoController extends Controller
{
    private $validationRules = [];
    private $fillable = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kilepo::all();
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
        $request->validate($this->validationRules, []);
        $kilepoItem = new Kilepo;
        $kilepoItem->fill($request->only($this->fillable));
        $kilepoItem->save();
        return response()->json($kilepoItem, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kilepo  $kilepo
     * @return \Illuminate\Http\Response
     */
    public function show(Kilepo $kilepo)
    {
        return $kilepo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kilepo  $kilepo
     * @return \Illuminate\Http\Response
     */
    public function edit(Kilepo $kilepo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kilepo  $kilepo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kilepo $kilepo)
    {
        $id = $request->id;
        $updateKilepo = Kilepo::where('id', $id)
            ->first()->update($request->only($this->fillable));
        return response()->json($updateKilepo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kilepo  $kilepo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kilepo $kilepo)
    {
        $kilepo->delete();
        return response()->json([
            'success' => true,
            'message' => 'Kilepo deleted successfully',
            'status' => 204
        ]);
    }
}
