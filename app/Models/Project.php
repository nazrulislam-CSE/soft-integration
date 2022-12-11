<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;
  
    protected $guarded = [];

    public function menu(){
        return $this->belongsTo('App\Models\Menu');
    }

    public function submenu(){
        return $this->belongsTo('App\Models\Submenu');
    }
}
