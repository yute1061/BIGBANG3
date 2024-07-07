<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'article_id' => 'required',
        'edited_at' => 'required',
    );
}
