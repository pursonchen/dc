<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     protected $fillable = [
        'name'
    ];

   /**
     * 获得此部门所属的人员。
     */

        public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
