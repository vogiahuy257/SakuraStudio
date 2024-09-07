<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';
    protected $primaryKey = 'id';
    public $timestamps = false; // Nếu bảng có sử dụng timestamps, bạn có thể bật lại

    protected $fillable = [
        'file_id',
        'field_name',
        'field_type',
        'created_at',
    ];

    // Các quan hệ nếu có (ví dụ: mối quan hệ với bảng field_values)
    public function fieldValues()
    {
        return $this->hasMany(FieldValue::class, 'field_id', 'id');
    }
}
