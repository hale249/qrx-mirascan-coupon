<?php

namespace App\Exports;

use App\Models\Agency;
use App\Models\CouponScanHistory;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use MongoDB\BSON\UTCDateTime;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class AgencyExport implements WithColumnFormatting, FromArray, WithTitle, WithEvents
{
    use Exportable;

    private $searchText;

    private $customerId;

    public function __construct($customerId, $searchText)
    {
        $this->searchText = $searchText;
        $this->customerId = $customerId;
    }

    public function headings(): array
    {
        return ['STT #', 'Name', 'Email', 'Phone number', 'Address', 'Staff count', 'Scan count', 'Created at'];
    }

    public function array(): array
    {
        $collections = [];
        $collections[] = $this->headings();

        $rowPointer = 0;
        $query = Agency::query()
            ->where('customer_id', $this->customerId)
            ->orderBy('created_at', 'ASC');

        if (!empty($this->searchText)) {
            $query = $query->where('name', 'like', '%' .$this->searchText . '%')
                ->orWhere('email', 'like', '%' .$this->searchText . '%')
                ->orWhere('phone_number', 'like', '%' . $this->searchText . '%');
        }

        $query->chunk(500, function ($agencies) use (&$rowPointer, &$collections) {
            foreach ($agencies as $agency) {
                $rowPointer += 1;
                $data['stt'] = $rowPointer;
                $data['name'] = $agency->name ?? '';
                $data['email'] =  $agency->email ?? '';
                $data['phone'] = $agency->phone_number ?? '';
                $data['address'] = $agency->address ?? '';
                $data['staff_count'] = $agency->staff_count ?? '0';
                $data['scan_count'] = $agency->scan_count ?? 0;
                $data['created_at']= $agency->created_at ? $agency->created_at->format('d-m-Y'): '';
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
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
            },
        ];
    }
}
