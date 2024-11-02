<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    protected $fillable = ['title'];
}
