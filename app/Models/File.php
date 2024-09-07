<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    protected $table = 'files';
    protected $primaryKey = 'id';

    // Bật tính năng timestamps
    public $timestamps = true;

    protected $fillable = [
        'filename',
    ];

    // Các quan hệ nếu có (ví dụ: mối quan hệ với bảng fields)
    public function fields()
    {
        return $this->hasMany(Field::class, 'file_id', 'id');
    }
}
