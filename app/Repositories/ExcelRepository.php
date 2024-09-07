<?php

namespace App\Repositories;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToArray;

class ExcelRepository extends BaseRepository implements ExcelRepositoryInterface
{
    /**
     * Import data from an Excel file into the database.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function importExcelFile($file)
    {
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $filename);

        // Save file information and get the new file ID
        $fileId = $this->createFile(session('user_id'), $filename);

        // Read the Excel file and process the data
        Excel::import(new class($fileId, $this) implements ToArray
        {
            private $fileId;
            private $repository;

            public function __construct($fileId, ExcelRepository $repository)
            {
                $this->fileId = $fileId;
                $this->repository = $repository;
            }

            public function array(array $array)
            {
                // Get the first row as the header
                $header = array_shift($array);
                $fields = [];

                // Save column information
                foreach ($header as $index => $fieldName) {
                    if ($fieldName === null) {
                        continue;
                    }
                    $fieldId = $this->repository->createField($this->fileId, $fieldName, 'string');
                    $fields[$index] = $fieldId;
                }

                // Save data for each row
                foreach ($array as $recordId => $row) {
                    foreach ($row as $index => $value) {
                        if ($value === null) {
                            continue;
                        }
                        $this->repository->createFieldValue($fields[$index], $recordId, $value);
                    }
                }
            }
        }, $path);

        // Delete the uploaded file
        Storage::delete($path);
    }
}
