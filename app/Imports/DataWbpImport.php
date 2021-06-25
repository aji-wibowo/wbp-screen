<?php

namespace App\Imports;

use App\DataWbp;
use App\Models\DataWbp as ModelsDataWbp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataWbpImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        ModelsDataWbp::truncate();
        return new ModelsDataWbp([
            'id' => $row['no'],
            'no_reg_instansi' => $row['no_reg_instansi'],
            'nama' => $row['nama'],
            'agama' => $row['agama'],
            'jenis_kejahatan' => $row['jenis_kejahatan'],
            'tgl_ekspirasi' => $row['tgl_ekspirasi'],
            'lokasi_blok' => $row['lokasi_blok'],
            'lokasi_sel' => $row['lokasi_sel'],
            'golongan_registrasi' => $row['golongan_registrasi'],
            'total_hukuman' => $row['total_hukuman_tahun_bulan_hari'],
            'foto' => $row['foto']
        ]);
    }
}
