<?php

namespace App\Exports;

use App\Models\Operator;
use App\Models\Recharge;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RechargeExport implements FromCollection, WithHeadings, WithMapping
{
    public function headings(): array
    {
        return ['operator', 'mobile', 'amount', 'recharged_at', 'status'];
    }

    public function map($recharge): array
    {
        return [
            Operator::find($recharge->operator_id)->name,
            $recharge->mobile,
            $recharge->amount,
            Carbon::parse($recharge->recharged_at)->format("d/m/Y h:i A"),
            $recharge->status
        ];
    }

    public function collection()
    {
        return Recharge::all();
    }
}
