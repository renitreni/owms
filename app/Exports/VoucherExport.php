<?php

namespace App\Exports;

use App\Models\Voucher;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VoucherExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Voucher::query()->with(['information'])->get();
    }

    public function map($voucher): array
    {
        return [
            $voucher->paid_to,
            $voucher->amount,
            $voucher->particulars,
            $voucher->change,
            $voucher->status,
            $voucher->information->name,
            Carbon::parse($voucher->date)->format('F j, Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'Paid To',
            'Amount',
            'Particulars',
            'Change',
            'Status',
            'Created by',
            'Date',
        ];
    }
}
