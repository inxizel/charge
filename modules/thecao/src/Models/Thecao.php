<?php

namespace Zent\Thecao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thecao extends Model
{
    use SoftDeletes;
    /*
     * Tables
     */
    
    protected $table = "thecaos";

    /*
     * Fillables
     */
    
    protected $fillable = ['name', 'content', 'status'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
