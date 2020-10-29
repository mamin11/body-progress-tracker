<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class ChestChart extends BaseChart
{
        /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'chestChart';

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
        $chest = measured_stat::get()->where('stat_type_id', '=', '3');
        $chestLabels = [];
        $chestCount = [];

        foreach($chest as $c)
        {
            array_push($chestLabels, $c->created_at->format('Y-m-d H:m:s'));
            array_push($chestCount, $c->value);
        }


        return Chartisan::build()
            ->labels($chestLabels)
            ->dataset('Sample', [100, 200, 300])
            ->dataset('Chest', $chestCount);
    }
}