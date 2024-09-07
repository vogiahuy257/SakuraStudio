<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Repositories\ExcelRepositoryInterface; 

class ContactController extends Controller
{
    private $excelRepository;

    public function __construct(ExcelRepositoryInterface $excelRepository)
    {
        $this->excelRepository = $excelRepository;
    }

    // Show all contacts
    public function show()
    {
        $files = $this->excelRepository->getAllFiles(session('user_id')); // Get all files for the user
        return view('Home.contacts', compact('files')); // Return view with files
    }

    // Handle file import
    public function importFile(Request $request)
    {
        // Validate the request contains a file
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls,csv', // Validate file types
        ]);

        // Retrieve file from the request
        $file = $request->file('excel_file');

        // Call the import method of ExcelRepository to process the file
        $this->excelRepository->importExcelFile($file); // Use ExcelRepository

        // Return a response after import
        return redirect()->route('user.contact.show')
                         ->with('success', 'The file has been imported successfully!');
    }

    // Show details of a specific file
    public function showFileDetails($id)
    {
        $file = $this->excelRepository->getFileById(session('user_id'), $id); // Get file details
        $fields = $this->excelRepository->getFieldsByFileId($file->id); // Get fields related to the file

        $fieldValues = [];
        foreach ($fields as $field) {
            $fieldValues[$field->id] = $this->excelRepository->getFieldValuesByFieldId($field->id); // Get values for each field
        }

        return view('Home.fileDetails', compact('file', 'fields', 'fieldValues')); // Return view with file details
    }

    // Handle file deletion
    public function deleteFile($id)
    {
        try {
            $file = File::findOrFail($id); // Find the file or fail
            $file->delete(); // Delete the file

            return redirect()->route('user.contact.show')
                             ->with('success', 'File deleted successfully.'); // Success message
        } catch (\Exception $e) {
            return redirect()->route('user.contact.show')
                             ->with('error', 'An error occurred while trying to delete the file.'); // Error message
        }
    }
}
