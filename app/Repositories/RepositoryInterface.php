<?php

namespace App\Repositories;

interface RepositoryInterface
{
    // File methods
    public function getAllFiles(int $userId);

    public function getFileById(int $userId, int $id);

    public function createFile(int $userId, string $filename): int;

    public function updateFile(int $id, string $filename): void;

    public function deleteFile(int $id): void;

    // Field methods
    public function getFieldsByFileId(int $fileId);

    public function createField(int $fileId, string $fieldName, string $fieldType): int;

    public function updateField(int $id, string $fieldName, string $fieldType): void;

    public function deleteField(int $id): void;

    public function deleteFieldsByFileId(int $fileId): void;

    // Field values methods
    public function getFieldValuesByFieldId(int $fieldId);

    public function getFieldValuesByFileId(int $fileId);

    public function createFieldValue(int $fieldId, int $recordId, string $value): void;

    public function updateFieldValue(int $id, string $value): void;

    public function deleteFieldValue(int $id): void;

    public function deleteFieldValuesByFieldId(int $fieldId): void;

    public function deleteFieldValuesByRecordId(int $recordId): void;
}
