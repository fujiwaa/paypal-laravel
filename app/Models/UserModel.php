<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $guarded = ['id_user'];

    public function Task()
    {
        return $this->hasMany(TaskModel::class, 'id_user');
    }
}
