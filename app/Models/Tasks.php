<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'task';
    //可以输入的column
    protected $fillable = ['title','description','due_date','isComplete'];

    //指定due_date为日期类型
    protected $dates = ['due_date'];
}
