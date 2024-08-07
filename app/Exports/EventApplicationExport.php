<?php

namespace App\Exports;

use App\Models\EventApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventApplicationExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): \Illuminate\Support\Collection
    {
            return EventApplication::with(['city', 'user'])->get();
    }

    public function headings(): array
    {
        return [
            'Başvuru ID',
            'Adı Soyadı',
            'E-Posta',
            'Telefon',
            'Şehir',
            'İş',
            'Çadır',
            'Uyku Tulumu',
            'Mat',
            'Sandalye',
            'Teleskop',
            'Teleskop Markası',
            'Dürbün',
            'Kamera',
            'Tripod',
            'Telsiz',
            'Bilgisayar',
            'Geliş Tarihi',
            'Ayrılış Tarihi',
            'Check-In Tarihi',
        ];
    }

    public function map($eventApplication): array
    {
        return [
            $eventApplication->id,
            $eventApplication->user->name,
            $eventApplication->user->email,
            $eventApplication->user->phone,
            $eventApplication->city->name,
            $eventApplication->job,
            $eventApplication->tent,
            $eventApplication->sleeping_bag,
            $eventApplication->mat,
            $eventApplication->chair,
            $eventApplication->telescope,
            $eventApplication->telescope_brand,
            $eventApplication->binocular,
            $eventApplication->camera,
            $eventApplication->tripod,
            $eventApplication->walkie_talkie,
            $eventApplication->computer,
            $eventApplication->arrival_date,
            $eventApplication->departure_date,
            $eventApplication->check_in,
        ];
    }
}
