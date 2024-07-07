<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    
    public static $rules = array(
    'tag' => 'required',
    'title' => 'required',
    'body1' => 'required',
    'user_id' => 'required',
    'user_name' => 'required',
    );
    
    // Article ModelとHistory Modelに関連付けを行う
    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
