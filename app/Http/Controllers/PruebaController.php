<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PruebaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->json(['mensaje' => 'Accediendo a index']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        return response()->json(['mensaje' => 'Insertando'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->json(['mensaje' => 'Ficha de ' . $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        return response()->json(['mensaje' => 'Actualizando elemento']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        return response()->json(['mensaje' => 'Borrando elemento']);
    }
}
