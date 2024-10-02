<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StudentController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file('csv_file');
        $filePath = $file->getRealPath();

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        unset($rows[0]);

        foreach ($rows as $row) {
            $studentData = [
                'id' => $row[0],
                'name' => $row[1],
                'address' => $row[2],
                'city' => $row[3],
            ];

            $studentExists = Student::where('id', $row[0])->exists();

            if (!$studentExists) {
                Student::create($studentData);
            }
        }

        return redirect()->back()->with('success', 'CSV uploaded and processed successfully.');
    }
    
}