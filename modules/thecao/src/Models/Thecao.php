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
    
    protected $fillable = ['uid', 'loaithe', 'serial', 'mathe', 'menhgia', 'thucnhan', 'shop', 'api', 'mathe', 'return_code', 'status'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
