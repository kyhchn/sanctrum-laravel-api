<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\V1\InvoiceFilter;
use App\Http\Resources\V1\InvoiceCollection;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Resources\V1\InvoiceResource;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new InvoiceFilter();
        $filterItems = $filter->transform($request);

        if(count($filterItems)==0){
            return new InvoiceCollection(Invoice::paginate());
        }else{
            $invoices = Invoice::where($filterItems)->paginate();
            return new InvoiceCollection($invoices->appends($request->query()));
            // return new InvoiceCollection(Invoice::where($filterItems)->paginate());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Invoice
     */
    public function show(Invoice $invoice)
    {
        //
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
