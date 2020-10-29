<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\measurement;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Models\measured_stat;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Support\Facades\Auth;

class WeightChart extends BaseChart
{
        /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'weightChart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'dashboard';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    // public ?string $prefix = 'some_prefix';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $measurments = measurement::get()->where('user_id', Auth::user()->id);

        $weightLabels = [];
        $weightCount = [];
        
        foreach($measurments as $measurment)
        {
        $weight = measured_stat::where([
            ['stat_type_id', '=', '1'],
            ['measurement_id', '=', $measurment->id]
            ])->get();
                
                foreach($weight as $w)
                {
                    array_push($weightLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($weightCount, $w->value);
                }        
        }





        return Chartisan::build()
            ->labels($weightLabels)
            // ->dataset('Sample', [100, 200, 300])
            ->dataset('Weight', $weightCount);
            // ->labels(['January', 'February', 'March'])
            // ->dataset('Sample 2', [5, 2, 1]);
    }
}