<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;


    protected $fillable =  [
        'query_id',
        'path_name'
        ];

    public  function  queries() {
        return $this->belongsTo(Queries::class);
    }
}
