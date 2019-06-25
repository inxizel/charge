<?php

namespace Zent\Thecaoweb\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thecaoweb extends Model
{
    use SoftDeletes;
    /*
     * Tables
     */
    
    protected $table = "thecaowebs";

    /*
     * Fillables
     */
    
    protected $fillable = ['name', 'content', 'status'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
