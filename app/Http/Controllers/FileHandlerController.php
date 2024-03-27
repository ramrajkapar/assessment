<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileHandlerController extends Controller
{
    public function jsonFileUploader()
    {
        return view('admin.file.json-file-uploader');
    }

    public function getExcelFileList()
    {
        $files = Document::OrderBy('id', 'desc')->get();
        return view('admin.file.converted-excel-files', ['files' => $files]);
    }

    public function downloadJsonFile($filename)
    {
        $filePath = storage_path('app/public/uploads/jsonFile/' . $filename);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404);
        }
    }

    public function downloadExcelFile($filename)
    {
        $filePath = storage_path('app/public/uploads/excelFile/' . $filename);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404);
        }
    }
}
