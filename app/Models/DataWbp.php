<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataWbp extends Model
{
    use HasFactory;

    protected $table = 'data_wbp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'no_reg_instansi', 'nama', 'agama', 'jenis_kejahatan', 'tgl_ekspirasi', 'lokasi_blok', 'lokasi_sel', 'golongan_registrasi', 'total_hukuman', 'foto'
    ];

    public static function getAllBlok()
    {
        return DB::select("select distinct lokasi_blok, lokasi_sel from data_wbp");
    }

    public static function getDefaultDisplayData()
    {
        return DB::select("select * from data_wbp");
    }

    public static function getDisplayDataByBlokAndSel($blok, $sel)
    {
        return DB::select("select * from data_wbp where lokasi_blok = '" . $blok . "' and lokasi_sel = '" . $sel . "'");
    }

    public static function getDisplayDataByBlok($blok)
    {
        return DB::select("select * from data_wbp where lokasi_blok = '" . $blok . "'");
    }
}
