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
        return ['type', 'operator', 'mobile', 'customer_id', 'amount', 'recharged_at', 'status'];
    }

    public function map($recharge): array
    {
        return [
            $recharge->type,
            Operator::find($recharge->operator_id)->name,
            $recharge->mobile,
            $recharge->customer_id,
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
