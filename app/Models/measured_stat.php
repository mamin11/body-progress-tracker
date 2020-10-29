<?php

namespace App\Models;

use App\Models\measurement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function getUserId()
    {
        $measurement = measurement::get()->where('id', $this->measurement_id)->first();
        return $user = $measurement->user_id;
    }

}
