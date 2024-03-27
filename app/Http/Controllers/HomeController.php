<?php

namespace App\Http\Controllers;

use App\Exports\UserInfoExport;
use App\Models\Document;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }


    public function postJsonFileUploader(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('jsonFile')) {
            $file = $request->file('jsonFile');
            $customFileName = uniqid() . '_' . rand(1000, 9999) . '_' . $file->getClientOriginalName();
            $customDirectory = 'uploads/jsonFile';
            $path = $file->storeAs($customDirectory, $customFileName, 'public');
            $document = [
                'json_file' => $customFileName,
                'date' => date('Y-m-d')
            ];
            Document::create($document);
            return redirect()->back()->with('message', 'File uploaded successsfully');
        } else {
            return "No file uploaded.";
        }
        // dd($jsonContent);

    }
}
