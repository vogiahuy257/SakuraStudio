<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;

class BaseRepository implements RepositoryInterface
{
    // File methods

    /**
     * Get all files including ID and other information.
     *
     * @param int $userId
     * @return \Illuminate\Support\Collection
     */
    public function getAllFiles(int $userId)
    {
        // Fetch files where deleted_at is null
        return DB::table('files')
            ->select('id', 'filename', 'created_at', 'updated_at')
            ->where('user_id', $userId)
            ->whereNull('deleted_at')
            ->get();
    }

    /**
     * Get a file by its ID.
     *
     * @param int $userId
     * @param int $id
     * @return \stdClass|null
     */
    public function getFileById(int $userId, int $id)
    {
        return DB::table('files')
            ->where('user_id', $userId)
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();
    }

    /**
     * Create a new file and return its ID.
     *
     * @param int $userId
     * @param string $filename
     * @return int
     */
    public function createFile(int $userId, string $filename): int
    {
        return DB::table('files')->insertGetId([
            'user_id' => $userId,
            'filename' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Update the filename by its ID.
     *
     * @param int $id
     * @param string $filename
     * @return void
     */
    public function updateFile(int $id, string $filename): void
    {
        DB::table('files')
            ->where('id', $id)
            ->update([
                'filename' => $filename,
                'updated_at' => now(),
            ]);
    }

    /**
     * Delete a file by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteFile(int $id): void
    {
        DB::table('files')
            ->where('id', $id)
            ->delete();
    }

    // Field methods

    /**
     * Get all fields for a file by its ID.
     *
     * @param int $fileId
     * @return \Illuminate\Support\Collection
     */
    public function getFieldsByFileId(int $fileId)
    {
        return DB::table('fields')
            ->where('file_id', $fileId)
            ->get();
    }

    /**
     * Create a new field for a file and return its ID.
     *
     * @param int $fileId
     * @param string $fieldName
     * @param string $fieldType
     * @return int
     */
    public function createField(int $fileId, string $fieldName, string $fieldType): int
    {
        return DB::table('fields')->insertGetId([
            'file_id' => $fileId,
            'field_name' => $fieldName,
            'field_type' => $fieldType,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Update a field by its ID.
     *
     * @param int $id
     * @param string $fieldName
     * @param string $fieldType
     * @return void
     */
    public function updateField(int $id, string $fieldName, string $fieldType): void
    {
        DB::table('fields')
            ->where('id', $id)
            ->update([
                'field_name' => $fieldName,
                'field_type' => $fieldType,
                'updated_at' => now(),
            ]);
    }

    /**
     * Delete a field by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteField(int $id): void
    {
        DB::table('fields')
            ->where('id', $id)
            ->delete();
    }

    // Field values methods

    /**
     * Get all field values for a field by its ID.
     *
     * @param int $fieldId
     * @return \Illuminate\Support\Collection
     */
    public function getFieldValuesByFieldId(int $fieldId)
    {
        return DB::table('field_values')
            ->where('field_id', $fieldId)
            ->get();
    }

    /**
     * Get all field values for a file by its ID.
     *
     * @param int $fileId
     * @return \Illuminate\Support\Collection
     */
    public function getFieldValuesByFileId(int $fileId)
    {
        return DB::table('field_values')
            ->join('fields', 'field_values.field_id', '=', 'fields.id')
            ->where('fields.file_id', $fileId)
            ->select('field_values.*')
            ->get();
    }

    /**
     * Create a new field value.
     *
     * @param int $fieldId
     * @param int $recordId
     * @param string $value
     * @return void
     */
    public function createFieldValue(int $fieldId, int $recordId, string $value): void
    {
        DB::table('field_values')->insert([
            'field_id' => $fieldId,
            'record_id' => $recordId,
            'value' => $value,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Update a field value by its ID.
     *
     * @param int $id
     * @param string $value
     * @return void
     */
    public function updateFieldValue(int $id, string $value): void
    {
        DB::table('field_values')
            ->where('id', $id)
            ->update([
                'value' => $value,
                'updated_at' => now(),
            ]);
    }

    /**
     * Delete a field value by its ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteFieldValue(int $id): void
    {
        DB::table('field_values')
            ->where('id', $id)
            ->delete();
    }

    /**
     * Delete all field values for a field by its ID.
     *
     * @param int $fieldId
     * @return void
     */
    public function deleteFieldValuesByFieldId(int $fieldId): void
    {
        DB::table('field_values')
            ->where('field_id', $fieldId)
            ->delete();
    }

    /**
     * Delete all fields for a file by its ID.
     *
     * @param int $fileId
     * @return void
     */
    public function deleteFieldsByFileId(int $fileId): void
    {
        DB::table('fields')
            ->where('file_id', $fileId)
            ->delete();
    }

    /**
     * Delete all field values for a record by its ID.
     *
     * @param int $recordId
     * @return void
     */
    public function deleteFieldValuesByRecordId(int $recordId): void
    {
        DB::table('field_values')
            ->where('record_id', $recordId)
            ->delete();
    }
}
