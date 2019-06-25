<?php

namespace Zent\Thecaoapi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thecaoapi extends Model
{
    use SoftDeletes;
    /*
     * Tables
     */
    
    protected $table = "thecaoapis";

    /*
     * Fillables
     */
    
    protected $fillable = ['loaithe', 'menhgia', 'api'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
