<?php

namespace App\Exports;

use App\Models\CouponScanHistory;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use MongoDB\BSON\UTCDateTime;

class ScanCouponExport implements WithColumnFormatting, FromArray, WithTitle, WithEvents
{
    use Exportable;

    private $filters;

    private $customerId;

    public function __construct($customerId, $filters)
    {
        $this->filters = $filters;
        $this->customerId = $customerId;
    }

    public function headings(): array
    {
        return ['STT #', 'Client name', 'Email', 'Phone number', 'Coupon Code', 'Agency name', 'Staff name', 'Verify at'];
    }

    public function array(): array
    {
        $collections = [];
        $collections[] = $this->headings();

        $rowPointer = 0;
        $query = CouponScanHistory::query()
            ->with(['qrcode', 'qrResponse', 'staff', 'agency'])
            ->where('customer_id', $this->customerId)
            ->orderBy('created_at', 'ASC');

        if (!empty($this->filters['agency_id'])) {
            $query = $query->where('agency_id', $this->filters['agency_id']);
        }

        if (!empty($this->filters['from_date']) && !empty($this->filters['to_date'])) {
            $startDate = new UTCDateTime(Carbon::parse($this->filters['from_date'])->startOfDay()->timestamp * 1000);
            $endDate = new UTCDateTime(Carbon::parse($this->filters['to_date'])->endOfDay()->timestamp * 1000);

            $query = $query->whereBetween('created_at', [$startDate, $endDate]);
        }


        $query->chunk(500, function ($scanQrcodes) use (&$rowPointer, &$collections) {
            foreach ($scanQrcodes as $scan) {
                $rowPointer += 1;
                $data['stt'] = $rowPointer;
                $data['client_name'] = !empty($scan->qrResponse->coupon['name']) ? $scan->qrResponse->coupon['name'] : '';
                $data['client_email'] = !empty($scan->qrResponse->coupon['email']) ? $scan->qrResponse->coupon['email'] : '';
                $data['client_phone'] = !empty($scan->qrResponse->coupon['phone']) ? $scan->qrResponse->coupon['phone'] : '';
                $data['code'] = !empty($scan->qrResponse->coupon['code']) ? $scan->qrResponse->coupon['code'] : '';
                $data['agency_name'] = !empty($scan->agency->name) ? $scan->agency->name : '';
                $data['staff_name'] = !empty($scan->staff->name) ? $scan->staff->name : '';
                $data['created_at']= $scan->created_at ? $scan->created_at->format('d-m-Y'): '';
                $collections[] = $data;
            }
        });

        return $collections;
    }
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
        ];
    }

    public function title(): string
    {
        return 'Danh sách scan coupon qrcode';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(8);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
            },
        ];
    }
}
