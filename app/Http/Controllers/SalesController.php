<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Imports\SalesImport;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //read from the sale model
        
        $sales = Sale::all();
        // dd($sales);
        return view('index',[
            'sales' => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
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
        // dd($request->all());
        $request->validate([
            'store_code' => 'required',
            'transaction_amount' => 'required|numeric',
        ]);

        Sale::create([
            'store_code' => $request->store_code,
            'transaction_amount' => $request->transaction_amount,
        ]);

        return redirect()
            ->route('sales.index')
            ->with('success', 'Sales transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sale = Sale::findOrFail($id);
        // dd($sale);
        return view('edit', [
            'sale' => $sale
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'store_code' => 'required',
            'transaction_amount' => 'required|numeric',
        ]);
        // dd($id);
        $sale = Sale::findOrFail($id);
        
        $sale->update([
            'store_code' => $request->store_code,
            'transaction_amount' => $request->transaction_amount,
        ]);

        return redirect()
            ->route('sales.index')
            ->with('success', 'Sales transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales.index');
    }
    public function export()
    {
        // dd('Sales export');
        return Excel::download(new SalesExport, 'sales.xlsx');
    }
    

    public function exportPdf()
    {
        $sales = Sale::all();

        $pdf = Pdf::loadView('pdf.sales', compact('sales'));

        return $pdf->download('sales.pdf');
    }

    public function uploadView()
    {
        //
        return view('upload');
    }

    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new SalesImport, $request->file('file'));

        return redirect()->route('sales.index')
                        ->with('success', 'Import successful.');
    }
}
