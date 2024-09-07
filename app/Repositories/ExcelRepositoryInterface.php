<?php

namespace App\Repositories;

interface ExcelRepositoryInterface extends RepositoryInterface
{
    public function importExcelFile($file);
}
