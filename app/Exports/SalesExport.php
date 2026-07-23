<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        // return Sale::all();
        return Sale::select(
            'store_code',
            'transaction_amount'
        )->get();
    }
    public function headings(): array
    {
        return [
            'Store Code',
            'Transaction Amount',
        ];
    }
}
