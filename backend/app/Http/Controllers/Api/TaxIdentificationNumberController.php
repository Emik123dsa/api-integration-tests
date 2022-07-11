<?php

namespace App\Http\Controllers\Api;


use App\Models\TaxIdentificationNumber;
use App\Services\Interfaces\TaxServiceInterface;
use Illuminate\Http\Request;

class TaxIdentificationNumberController extends ApiController
{

    public function __construct(
        private TaxServiceInterface $taxService,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->taxService->findAll();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaxIdentificationNumber  $taxIdentificationNumber
     * @return \Illuminate\Http\Response
     */
    public function show(TaxIdentificationNumber $taxIdentificationNumber)
    {
        return array();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaxIdentificationNumber  $taxIdentificationNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(TaxIdentificationNumber $taxIdentificationNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaxIdentificationNumber  $taxIdentificationNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxIdentificationNumber $taxIdentificationNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaxIdentificationNumber  $taxIdentificationNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxIdentificationNumber $taxIdentificationNumber)
    {
        //
    }
}
