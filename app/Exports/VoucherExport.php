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
            Carbon::parse($voucher->created_at)->format('F j, Y'),
            $voucher->name,
            $voucher->status,
            $voucher->source,
            $voucher->requirements,
            $voucher->passporting_allowance,
            $voucher->ticket,
            $voucher->tesda_allowance,
            $voucher->nbi_renewal,
            $voucher->medical_allowance,
            $voucher->pdos,
            $voucher->info_sheet,
            $voucher->owwa_allowance,
            $voucher->office_allowance,
            $voucher->travel_allowance,
            $voucher->weekly_allowance,
            $voucher->medical_follow_up,
        ];
    }

    public function headings(): array
    {
        return [
            "Date Created",
            "Name",
            "Source",
            "Requirements",
            "Passporting Allowance",
            "TICKET",
            "TESDA Allowance",
            "NBI/Renewal",
            "Medical Allowance",
            "PDOS",
            "Info Sheer",
            "OWWA Allowance",
            "Office Allowance",
            "Travel Allowance",
            "Weekly Allowance",
            "Medical Follow Up",
        ];
    }
}
