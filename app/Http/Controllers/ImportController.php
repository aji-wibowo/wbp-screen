<?php

namespace App\Http\Controllers;

use App\Imports\DataWbpImport;
use App\Models\DataWbp;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\VarDumper\Cloner\Data;

class ImportController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        DataWbp::truncate();

        Excel::import(new DataWbpImport, request()->file('file'));

        return back();
    }
}
