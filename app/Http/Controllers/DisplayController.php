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

        $labelBlok = "";
        $labelLantai = "";

        if ($r->blok != null && $r->sel != null) {
            $dataDisplay = DataWbp::getDisplayDataByBlokAndSel($r->blok, $r->sel);
            $labelBlok = $r->blok;
            $labelLantai = $r->sel;
        } else if ($r->blok != null && $r->sel == null) {
            $dataDisplay = DataWbp::getDisplayDataByBlok($r->blok);
            $labelBlok = $r->blok;
            $labelLantai = '';
        } else {
            $dataDisplay = DataWbp::getDefaultDisplayData();
            $labelBlok = 'PAMSUS';
            $labelLantai = 'TP Tutup Sunyi LT 1/L1';
        }

        /**
         * [
         *   'blok' => [
         *                  'lantai ruangan' => []
         *              ]
         * ]
         */

        $row1 = [];

        $color = [
            'B' => 'red',
            'A' => 'blue',
            'H' => 'green'
        ];

        // dd($dataDisplay);

        foreach ($dataDisplay as $key => $item) {
            if ($item->lokasi_blok != null) {
                $row1[$item->lokasi_blok . $item->lokasi_sel][] = [
                    'nama_blok' => $item->lokasi_blok,
                    'nama_lantai' => $item->lokasi_sel,
                    'data_wbp' => $item
                ];
            } else {
                // $row1['Non-Blok']['Non-Ruangan'][] = $item;
                $row1[$item->lokasi_blok . $item->lokasi_sel][] = [
                    'nama_blok' => $item->lokasi_blok,
                    'nama_lantai' => $item->lokasi_sel,
                    'data_wbp' => $item
                ];
            }
        }

        ksort($row1);
        // dd($row1);

        foreach ($row1 as $key => $value) {
            if (count($row1[$key]) > 16) {
                for ($i = 0; $i < count($row1[$key]); $i++) {
                    if ($i < 16) {
                        $row2[$key]['part1'][] = $row1[$key][$i];
                    } else {
                        $row2[$key]['part2'][] = $row1[$key][$i];
                    }
                }
            } else {
                $row2[$key] = $row1[$key];
            }
        }

        ksort($row2);
        // dd($row2);

        $parseData = [
            'blok' => $blok,
            'dataDisplay' => $row2,
            'lantai' => $lantai,
            'blokname' => $labelBlok,
            'selname' => $labelLantai,
            'color' => $color
        ];

        return view('welcome', $parseData);
    }
}
