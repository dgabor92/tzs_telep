<?php

namespace App\Http\Controllers;

use App\Models\Szemelygepkocsi;
use Illuminate\Http\Request;

class SzemelygepkocsiController extends Controller
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
        return Szemelygepkocsi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Szemelygepkocsi  $szemelygepkocsi
     * @return \Illuminate\Http\Response
     */
    public function show(Szemelygepkocsi $szemelygepkocsi)
    {
        return $szemelygepkocsi;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Szemelygepkocsi  $szemelygepkocsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Szemelygepkocsi $szemelygepkocsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Szemelygepkocsi  $szemelygepkocsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Szemelygepkocsi $szemelygepkocsi)
    {
        $id = $szemelygepkocsi->id;
        $updateSzemely = Szemelygepkocsi::where('id', $id)
            ->first()->update($request->only($this->fillable));
        return response()->json($updateSzemely, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Szemelygepkocsi  $szemelygepkocsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Szemelygepkocsi $szemelygepkocsi)
    {
        $szemelygepkocsi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Személygépkocsi deleted successfully',
            'status' => 204
        ]);
    }
}
