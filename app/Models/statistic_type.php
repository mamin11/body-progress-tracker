<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistic_type extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function getStatisticUnits()
    {
        if($this->name === 'weight')
        {
            return 'kg';
        }
        return 'cm';
    }
}
