<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;


class KamionSheet implements FromCollection, WithTitle, WithHeadings
{
    protected $kamionok;

    public function __construct(array $kamionok)
    {
        $this->kamionok = $kamionok;
    }

    public function collection()
    {
        return collect($this->kamionok);
    }

    public function title(): string
    {
        return 'Kamionok';
    }

    public function headings(): array
    {
        return [
            'Id',
            'Sofőr neve',
            'Rendszám',
            'Szállító levél száma',
            'Belépés dátuma',
            'Kilépés dátuma',
            'Súly üresen',
            'Súly tele',
            'Megjegyzés',
            'Létrehozás dátuma',
            'Változtatás dátuma',
        ];
    }
}
