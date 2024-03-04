<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todo';
    protected $primary_key = 'id';
    protected $fillable = ['Name', 'Beschreibung', 'Datum', 'Uhrzeit', 'Status'];

    public $timestamps = false;

}
