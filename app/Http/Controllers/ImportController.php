<?php

namespace App\Http\Controllers;

use App\Repositories\ExcelRepositoryInterface; // Import the ExcelRepository
use Illuminate\Http\Request;

class ImportController extends Controller
{
    private $excelRepository; // Variable for storing the ExcelRepository instance

    public function __construct(ExcelRepositoryInterface $excelRepository) // Constructor to inject ExcelRepository
    {
        $this->excelRepository = $excelRepository;
    }

    // Show Canvas 1 design
    public function showCanvas1()
    {
        return view('Canvas.Canvas1');
    }

    // Show Canvas 2 design
    public function showCanvas2()
    {
        return view('Canvas.Canvas2');
    }

    // Show Canvas 3 design
    public function showCanvas3()
    {
        return view('Canvas.Canvas3');
    }

    // Show main Canvas design
    public function showCanvas()
    {
        $fileValue = null; // Variable to hold selected file value
        $fields = null; // Variable to hold fields related to the selected file
        $fieldValuesArray = []; // Array to hold field values
        $userId = session('user_id'); // Get user ID from session
        $files = $this->excelRepository->getAllFiles($userId); // Get all files for the user
        return view('Canvas.CanvasPro', compact('files', 'fileValue', 'fields', 'fieldValuesArray'));
    }

    // Handle retrieval of fields and field values based on file ID
    public function getFields(Request $request)
    {
        $fileId = $request->input('file_id'); // Get file ID from the request
        if (empty($fileId)) {
            return redirect()->back()->with('error', 'Please select a valid file.'); // Check for valid file ID
        }

        $userId = session('user_id');
        $files = $this->excelRepository->getAllFiles($userId); // Get all files for the user

        // Check if the selected file exists
        $selectedFile = $files->firstWhere('id', $fileId);
        if (!$selectedFile) {
            return redirect()->back()->with('error', 'Invalid file selected.'); // Handle invalid file selection
        }

        $fileValue = $selectedFile->id; // Store selected file ID
        $fields = $this->excelRepository->getFieldsByFileId($fileId); // Get fields for the selected file

        // Retrieve all field values for the current file ID
        $fieldValues = $this->excelRepository->getFieldValuesByFileId($fileId);

        // Create a 2D array with field_id as the key and corresponding values as rows
        $fieldValuesArray = [];
        foreach ($fieldValues as $fieldValue) {
            $fieldValuesArray[$fieldValue->field_id][] = $fieldValue->value; // Group values by field ID
        }

        return view('Canvas.CanvasPro', compact('files', 'fileValue', 'fields', 'fieldValuesArray'));
    }
}
