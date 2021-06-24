<?php

namespace App\Http\Controllers;

use App\Models\DataWbp;
use Illuminate\Http\Request;
use SebastianBergmann\LinesOfCode\Counter;

class DisplayController extends Controller
{
    public function index(Request $r)
    {
        $lantai = $this->generateArrayLantaiSubMenus();
        $blok = $this->generateArrayMenus();

        if ($r->blok != null && $r->sel != null) {
            $dataDisplay = DataWbp::getDisplayDataByBlokAndSel($r->blok, $r->sel);
        } else if ($r->blok != null && $r->sel == null) {
            $dataDisplay = DataWbp::getDisplayDataByBlok($r->blok);
        } else {
            $dataDisplay = DataWbp::getDefaultDisplayData();
        }

        $jumlahData = count($dataDisplay);
        $row1 = [];

        if ($jumlahData > 0) {
            $limit = $jumlahData / 12;
            $limitFinal = 0;
            for ($i = 0; $i < $jumlahData; $i++) {
                if ($limitFinal <= $limit) {
                    $row1[$limitFinal][] = $dataDisplay[$i];
                    $limitFinal++;
                } else {
                    $limitFinal = 0;
                }
            }
        }

        // dd($row1);

        $parseData = [
            'blok' => $blok,
            'dataDisplay' => $row1,
            'lantai' => $lantai,
            'blokname' => $r->blok != null ? $r->blok : 'PAMSUS',
            'selname' => $r->sel != null ? $r->sel : 'TP Tutup Sunyi LT 1/L1'
        ];

        return view('welcome', $parseData);
    }
}
