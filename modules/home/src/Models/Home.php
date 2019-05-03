<?php

namespace Zent\Home\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Home extends Model
{
    use SoftDeletes;
    /*
     * Tables
     */
    
    protected $table = "homes";

    /*
     * Fillables
     */
    
    protected $fillable = ['name', 'content', 'status'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
