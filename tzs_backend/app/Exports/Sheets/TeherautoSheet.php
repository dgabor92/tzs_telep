<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TeherautoSheet implements FromCollection, WithTitle, WithHeadings
{
  protected $teherautok;

  public function __construct(array $teherautok)
  {
    $this->teherautok = $teherautok;
  }

  public function collection()
  {
    return collect($this->teherautok);
  }

  public function title(): string
  {
    return 'Teherautok';
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
