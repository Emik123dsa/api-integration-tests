<?php

namespace App\Http\Controllers\Api;


use App\Models\Tax;
use App\Services\Interfaces\TaxServiceInterface;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

/**
 * Standalone REST resource for {@link Tax} entity.
 *
 * @author EmilShari <emil.shari87@gmail.com>
 */
final class TaxController extends ApiController
{
    /**
     * Creates an instance of {@link TaxController}.
     *
     * @param TaxServiceInterface $taxService  to service for {@libk Tax} entity.
     */
    public function __construct(
        private LoggerInterface $logger,
        private TaxServiceInterface $taxService,
    ) {
    }

    /**
     * GET  /taxes: get all taxes according to their amounts.
     *
     * {@inheritDoc}
     *
     * @return \Illuminate\Http\Response response entity with status 200 (OK) and the list of taxes or
     * the \Illuminate\Http\Response with status 404 (NOT FOUND) in the case, if amount of taxes
     * is equaling to zero/empty.
     *
     * @ApiOperation(notes = "Return all of the taxes",
     *     value =  "Get all of the taxes entities, which have ever been created for full history",
     *     nickname = "getAllTaxes")
     * @ApiResponses({
     *     @ApiResponse(code = 404, message = "Shop not found", response = RestErrorDto.class),
     * })
     * @Timed
     * @GetMapping("/taxes")
     */
    public function getAllTaxes()
    {
        $this->logger->debug("REST request to fetch all of the taxes in entity");

        /** @internal find all taxes in service. */
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
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //
    }
}
