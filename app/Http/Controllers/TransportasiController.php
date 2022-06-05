<?php

namespace App\Http\Controllers;

use App\Models\Transportasi;
use App\Http\Requests\StoreTransportasiRequest;
use App\Http\Requests\UpdateTransportasiRequest;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTransportasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransportasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function show(Transportasi $transportasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportasi $transportasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransportasiRequest  $request
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransportasiRequest $request, Transportasi $transportasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportasi $transportasi)
    {
        //
    }
}
