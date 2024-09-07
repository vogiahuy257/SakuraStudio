<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldValue extends Model
{
    protected $table = 'field_values';
    protected $primaryKey = 'id';
    public $timestamps = false; // Nếu bảng có sử dụng timestamps, bạn có thể bật lại

    protected $fillable = [
        'field_id',
        'record_id',
        'value',
        'created_at',
    ];

    // Các quan hệ nếu có (ví dụ: mối quan hệ với bảng fields)
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id', 'id');
    }
}
