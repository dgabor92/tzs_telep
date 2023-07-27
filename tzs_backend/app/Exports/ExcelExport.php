<?php

namespace App\Exports;

use App\Models\Kamion;
use App\Models\Teherauto;
use App\Models\Szemelygepkocsi;
use App\Models\Vagon;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Exports\Sheets\KamionSheet;
use App\Exports\Sheets\TeherautoSheet;
use App\Exports\Sheets\SzemelygepkocsiSheet;
use App\Exports\Sheets\VagonSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use Maatwebsite\Excel\Facades\Excel;


class ExcelExport implements WithMultipleSheets
{
  use Exportable;

  public function __construct()
  {
  }


  // public function view(): View
  // {
  //   $kamionok = Kamion::all()->toArray();
  //   $teherautok = Teherauto::all()->toArray();
  //   $szemelygepkocsik = Szemelygepkocsi::all()->toArray();
  //   $vagonok = Vagon::all()->toArray();

  //   $result = [];
  //   foreach ($kamionok as $kamion) {
  //     $result['kamionok'][] = $kamion;
  //   }
  //   foreach ($teherautok as $teherauto) {
  //     $result['teherautok'][] = $teherauto;
  //   }
  //   foreach ($szemelygepkocsik as $szemelygepkocsi) {
  //     $result['szemelygepkocsik'][] = $szemelygepkocsi;
  //   }
  //   foreach ($vagonok as $vagon) {
  //     $result['vagonok'][] = $vagon;
  //   }

  //   return view('exports.export_excel', [
  //     'result' => $result
  //   ]);
  // }

  // function download()
  // {
  //   $kamionok = Kamion::all()->toArray();
  //   $teherautok = Teherauto::all()->toArray();
  //   $szemelygepkocsik = Szemelygepkocsi::all()->toArray();
  //   $vagonok = Vagon::all()->toArray();

  //   $result = [];
  //   foreach ($kamionok as $kamion) {
  //     $result['kamionok'][] = $kamion;
  //   }
  //   foreach ($teherautok as $teherauto) {
  //     $result['teherautok'][] = $teherauto;
  //   }
  //   foreach ($szemelygepkocsik as $szemelygepkocsi) {
  //     $result['szemelygepkocsik'][] = $szemelygepkocsi;
  //   }
  //   foreach ($vagonok as $vagon) {
  //     $result['vagonok'][] = $vagon;
  //   }

  //   return Excel::download(new ExcelExportView($result), 'export.xlsx');
  // }
  public function sheets(): array
  {
    $kamionok = Kamion::all()->toArray();
    $teherautok = Teherauto::all()->toArray();
    $szemelygepkocsik = Szemelygepkocsi::all()->toArray();
    $vagonok = Vagon::all()->toArray();

    $sheets = [
      new KamionSheet($kamionok),
      new TeherautoSheet($teherautok),
      new SzemelygepkocsiSheet($szemelygepkocsik),
      new VagonSheet($vagonok),
    ];

    return $sheets;
  }
}
