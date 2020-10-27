<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class measured_stat extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    use HasFactory;

    public function getStatistic()
    {
        $statistics = statistic_type::get()->where('id', $this->stat_type_id)->first();
        return $statistics;
    }
}
