<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cylinder extends Model
{
    use HasFactory;
    protected $table = 'cylinder';
    protected $primaryKey = 'transid';
    public $timestamps = false;
    protected $fillable =[
        'transid',
        'size',
        'price',
        'modifyuser',
        'modifydate',
        'deleted',
    ];
}
