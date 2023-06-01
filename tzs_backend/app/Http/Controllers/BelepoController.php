<?php

namespace App\Http\Controllers;

use App\Models\Belepo;
use Illuminate\Http\Request;

class BelepoController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Belepo::all();
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
        $belepoItem = new Belepo;
        $belepoItem->fill($request->only($this->fillable));
        $belepoItem->save();
        return response()->json($belepoItem, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Belepo  $belepo
     * @return \Illuminate\Http\Response
     */
    public function show(Belepo $belepo)
    {
        return $belepo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Belepo  $belepo
     * @return \Illuminate\Http\Response
     */
    public function edit(Belepo $belepo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Belepo  $belepo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Belepo $belepo)
    {
        $id = $request->id;
        $updateBelepo = Belepo::where('id', $id)
            ->first()->update($request->only($this->fillable));
        return response()->json($updateBelepo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Belepo  $belepo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Belepo $belepo)
    {
        $belepo->delete();
        return response()->json([
            'success' => true,
            'message' => 'Belepo deleted successfully',
            'status' => 204
        ]);
    }
}
