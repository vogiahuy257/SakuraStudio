<?php

namespace App\Http\Controllers;

use App\Repositories\ExcelRepositoryInterface; // Import the ExcelRepository
use Illuminate\Http\Request;
use App\Models\Card;

class ImportController extends Controller
{
    private $excelRepository; // Variable for storing the ExcelRepository instance

    public function __construct(ExcelRepositoryInterface $excelRepository) // Constructor to inject ExcelRepository
    {
        $this->excelRepository = $excelRepository;
    }

    // Show main Canvas design
    public function showCanvasPro()
    {
        $fileValue = null; // Variable to hold selected file value
        $fields = null; // Variable to hold fields related to the selected file
        $fieldValuesArray = []; // Array to hold field values
        $userId = session('user_id'); // Get user ID from session
        $files = $this->excelRepository->getAllFiles($userId); // Get all files for the user
        return view('Canvas.CanvasPro', compact('files', 'fileValue', 'fields', 'fieldValuesArray'));
    }

    // Show main Canvas form Database
    public function showCanvas($id)
    {
        $card = Card::findOrFail($id);
        $fileValue = null;
        $fields = null; 
        $fieldValuesArray = []; 
        $userId = session('user_id'); 
        $files = $this->excelRepository->getAllFiles($userId);


        if($card)
        {
            return view('Canvas.Canvas', [
                'card' => $card,
                'files' => $files,
                'fileValue' => $fileValue,
                'fields' => $fields,
                'fieldValuesArray' => $fieldValuesArray,
            ]);
        }
        else
        {
            return response()->json(['error' => 'Card not found'], 404);
        }
    }

    // Handle retrieval of fields and field values based on file ID
    public function getFields(Request $request,$id)
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

        if($id > 0)
        {
            $card = Card::findOrFail($id);
             return view('Canvas.Canvas', compact('files', 'fileValue', 'fields', 'fieldValuesArray','card'));
        }
        else
        {
            return view('Canvas.CanvasPro', compact('files', 'fileValue', 'fields', 'fieldValuesArray'));
        }
        
    }
}
