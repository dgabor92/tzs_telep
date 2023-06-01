<?php

namespace App\Http\Controllers;

use App\Models\Teherauto;
use Illuminate\Http\Request;

class TeherautoController extends Controller
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
        return Teherauto::all();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teherauto  $teherauto
     * @return \Illuminate\Http\Response
     */
    public function show(Teherauto $teherauto)
    {
        return $teherauto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teherauto  $teherauto
     * @return \Illuminate\Http\Response
     */
    public function edit(Teherauto $teherauto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teherauto  $teherauto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teherauto $teherauto)
    {
        $id = $request->id;
        $updateTeherauto = Teherauto::where('id', $id)
            ->first()->update($request->only($this->fillable));
        return response()->json($updateTeherauto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teherauto  $teherauto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teherauto $teherauto)
    {
        $teherauto->delete();
        return response()->json([
            'success' => true,
            'message' => 'Teherauto deleted successfully',
            'status' => 204
        ]);
    }
}
