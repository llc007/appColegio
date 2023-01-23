<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    //
    public function index(){
        return view('reports.index');
    }

    public function users(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function indexImport()
    {
        return view('imports.index');
    }

    public function userImport(){
        return view('imports.users');
    }

    public function storeUsers(Request $request){
        Excel::import(new UsersImport, request()->file('users'));

        return redirect('/')->with('succes','All good!');
    }
}
