<?php

namespace App\Http\Controllers;

use App\Models\Kamion;
use Illuminate\Http\Request;

class KamionController extends Controller
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
        return Kamion::all();
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
        $kamionItem = new Kamion;
        $kamionItem->fill($request->only($this->fillable));
        $kamionItem->save();
        return response()->json($kamionItem, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamion  $kamion
     * @return \Illuminate\Http\Response
     */
    public function show(Kamion $kamion)
    {
        return $kamion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamion  $kamion
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamion $kamion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kamion  $kamion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamion $kamion)
    {
        $id = $request->id;
        $updateKamion = Kamion::where('id', $id)
            ->first()->update($request->only($this->fillable));
        return response()->json($updateKamion, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamion  $kamion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamion $kamion)
    {
        $kamion->delete();
        return response()->json([
            'success' => true,
            'message' => 'Kamion deleted successfully',
            'status' => 204
        ]);
    }
}
