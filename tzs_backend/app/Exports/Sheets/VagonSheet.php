<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;


class VagonSheet implements FromCollection, WithTitle, WithHeadings
{
  protected $vagonok;

  public function __construct(array $vagonok)
  {
    $this->vagonok = $vagonok;
  }

  public function collection()
  {
    return collect($this->vagonok);
  }

  public function title(): string
  {
    return 'Vagonok';
  }

  public function headings(): array
  {
    return [
      'Id',
      'Vagon száma',
      'Belépés dátuma',
      'Kilépés dátuma',
      'Megjegyzés',
      'Létrehozás dátuma',
      'Változtatás dátuma',
    ];
  }
}
