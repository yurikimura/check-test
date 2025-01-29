<?php

namespace App\Http\Controllers\ExportController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExportClass;

class ExportController extends Controller
{
  public function csvExport(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
  {
    $name = $request->query('name');
    $gender = (int)$request->query('gender');

    // CSVエクスポートのロジック
    return Excel::download(new UsersExportClass($name, $gender), 'export.csv');
  }
}
