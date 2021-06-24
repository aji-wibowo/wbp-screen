<?php

namespace App\Http\Controllers;

use App\Imports\DataWbpImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        Excel::import(new DataWbpImport, request()->file('file'));

        return back();
    }
}
