<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SzemelygepkocsiSheet implements FromCollection, WithTitle, WithHeadings
{
  protected $szemelygepkocsik;

  public function __construct(array $szemelygepkocsik)
  {
    $this->szemelygepkocsik = $szemelygepkocsik;
  }

  public function collection()
  {
    return collect($this->szemelygepkocsik);
  }

  public function title(): string
  {
    return 'Szemelygepkocsik';
  }

  public function headings(): array
  {
    return [
      'Id',
      'Sofőr neve',
      'Rendszám',
      'Belépés dátuma',
      'Kilépés dátuma',
      'Megjegyzés',
      'Létrehozás dátuma',
      'Változtatás dátuma',
    ];
  }
}
