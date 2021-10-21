<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['module_id', 'name', 'video', 'description'];

    public function Modules()
    {
        return $this->belongsTo(Module::class);
    }
}
