<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       
       return view('admin.customer.import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function ExportCustomer() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function ImportCustomer() 
    {
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
    }
}
