<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Thêm dòng này nếu bạn sử dụng factories
use Illuminate\Support\Facades\Hash; // Đảm bảo import Hash
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasFactory,SoftDeletes; // Sử dụng HasFactory nếu bạn sử dụng factories

    protected $dates = ['deleted_at'];

    /**
     * Các thuộc tính có thể được gán bằng cách sử dụng mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'role',
        'email',
        'phone',
    ];

    /**
     * Các thuộc tính cần được ẩn khi trả về mảng hoặc JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // /**
    //  * Thiết lập mặc định để mã hóa mật khẩu.
    //  *
    //  * @param string $value
    //  * @return void
    //  */
    // // public function setPasswordAttribute($value)
    // // {
    // //     $this->attributes['password'] = Hash::make($value);
    // // }

}
