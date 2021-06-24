<?php

namespace App\Http\Controllers;

use App\Models\DataWbp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function generateArrayMenus()
    {
        $arrayMenus = [];

        $blok = DataWbp::getAllBlok();
        foreach ($blok as $key => $r) {
            $arrayMenus[$r->lokasi_blok != null ? $r->lokasi_blok : 'Non Blok'][] = $r->lokasi_sel;
        }

        return $arrayMenus;
    }

    public function generateArrayLantaiSubMenus()
    {
        $arrayMenus = [];

        $blok = DataWbp::getAllBlok();
        foreach ($blok as $key => $r) {
            $indexBlok = $r->lokasi_blok != null ? $r->lokasi_blok : 'Non Blok';
            $lantai[$indexBlok] = explode('/', $r->lokasi_sel);
            $arrayMenus[$indexBlok][$lantai[$indexBlok][0]][] = [
                'gafull' => isset($lantai[$indexBlok][1]) ? $lantai[$indexBlok][1] : 'All',
                'full' => $r->lokasi_sel,
            ];
        }

        return $arrayMenus;
    }
}
