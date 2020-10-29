<?php

namespace App\Http\Controllers;

use App\Models\measurement;
use App\Models\measured_stat;
use App\Models\statistic_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Charts\WeightChart;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $homeChart = new WeightChart;
        $homeChart->labels(['January', 'February', 'March', 'April', 'May']);
        $homeChart->dataset('Weight Data', 'bar', [100, 90, 80, 70, 60])
        ->backgroundColor('rgba(68, 86, 105, 0.8)');

        return view('Welcome', compact('homeChart'));
    }

    public function chartData()
    {

        //$weight = measured_stat::get()->where('stat_type_id', '=', '1');
        // $weightLabels = [];
        // $weightCount = [];

        // foreach($weight as $w)
        // {
        //     array_push($weightLabels, $w->created_at);
        //     array_push($weightCount, $w->value);
        // }

        // $waist = measured_stat::get()->where('stat_type_id', '=', '2')->orderBy('created_at')->pluck('value', 'created_at');

        // $chest = measured_stat::get()->where('stat_type_id', '=', '3')->orderBy('created_at')->pluck('value', 'created_at');

        // $neck = measured_stat::get()->where('stat_type_id', '=', '4')->orderBy('created_at')->pluck('value', 'created_at');

        // $leftUpperArm = measured_stat::get()->where('stat_type_id', '=', '5')->orderBy('created_at')->pluck('value', 'created_at');
        // $rightUpperArm = measured_stat::get()->where('stat_type_id', '=', '6')->orderBy('created_at')->pluck('value', 'created_at');

        // $leftLowerArm = measured_stat::get()->where('stat_type_id', '=', '7')->orderBy('created_at')->pluck('value', 'created_at');
        // $rightLowerArm = measured_stat::get()->where('stat_type_id', '=', '8')->orderBy('created_at')->pluck('value', 'created_at');

        // $leftThigh = measured_stat::get()->where('stat_type_id', '=', '9')->orderBy('created_at')->pluck('value', 'created_at');
        // $rightThigh = measured_stat::get()->where('stat_type_id', '=', '10')->orderBy('created_at')->pluck('value', 'created_at');

        // $leftCalf = measured_stat::get()->where('stat_type_id', '=', '11')->orderBy('created_at')->pluck('value', 'created_at');
        // $rightCalf = measured_stat::get()->where('stat_type_id', '=', '12')->orderBy('created_at')->pluck('value', 'created_at');
        

        // $weights = new WeightChart;
        // $weights->labels($weightLabels);
        // $weights->dataset('Weight', 'bar', $weightCount);


        $measurments = measurement::get()->where('user_id', Auth::user()->id);

        $weightLabels = [];
        $weightCount = [];

        $waistLabels = [];
        $waistCount = [];
        
        $chestLabels = [];
        $chestCount = [];

        $neckLabels = [];
        $neckCount = [];

        $leftUpperArmLabels = [];
        $leftUpperArmCount = [];

        $rightUpperArmLabels = [];
        $rightUpperArmCount = [];

        $leftLowerArmLabels = [];
        $leftLowerArmCount = [];

        $rightLowerArmLabels = [];
        $rightLowerArmCount = [];

        $leftThighLabels = [];
        $leftThighCount = [];

        $rightThighLabels = [];
        $rightThighCount = [];

        $leftCalfLabels = [];
        $leftCalfCount = [];

        $rightCalfLabels = [];
        $rightCalfCount = [];

        foreach($measurments as $measurment)
        {
            $weight = measured_stat::where([
                ['stat_type_id', '=', '1'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $waist = measured_stat::where([
                ['stat_type_id', '=', '2'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $chest = measured_stat::where([
                ['stat_type_id', '=', '3'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $neck = measured_stat::where([
                ['stat_type_id', '=', '4'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $leftUArm = measured_stat::where([
                ['stat_type_id', '=', '5'],
                ['measurement_id', '=', $measurment->id]
                ])->get();
                
            $rightUArm = measured_stat::where([
                ['stat_type_id', '=', '6'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $leftLArm = measured_stat::where([
                ['stat_type_id', '=', '7'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $rightLArm = measured_stat::where([
                ['stat_type_id', '=', '8'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $leftTh = measured_stat::where([
                ['stat_type_id', '=', '9'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $rightTh = measured_stat::where([
                ['stat_type_id', '=', '10'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $leftC = measured_stat::where([
                ['stat_type_id', '=', '11'],
                ['measurement_id', '=', $measurment->id]
                ])->get();

            $rightC = measured_stat::where([
                ['stat_type_id', '=', '12'],
                ['measurement_id', '=', $measurment->id]
                ])->get();
                
                foreach($weight as $w)
                {
                    array_push($weightLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($weightCount, $w->value);
                }        

                foreach($waist as $w)
                {
                    array_push($waistLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($waistCount, $w->value);
                }

                foreach($chest as $w)
                {
                    array_push($chestLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($chestCount, $w->value);
                }

                foreach($neck as $w)
                {
                    array_push($neckLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($neckCount, $w->value);
                }

                foreach($leftUArm as $w)
                {
                    array_push($leftUpperArmLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($leftUpperArmCount, $w->value);
                }

                foreach($rightUArm as $w)
                {
                    array_push($rightUpperArmLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($rightUpperArmCount, $w->value);
                }

                foreach($leftLArm as $w)
                {
                    array_push($leftLowerArmLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($leftLowerArmCount, $w->value);
                }
                
                foreach($rightLArm as $w)
                {
                    array_push($rightLowerArmLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($rightLowerArmCount, $w->value);
                }

                foreach($leftTh as $w)
                {
                    array_push($leftThighLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($leftThighCount, $w->value);
                }

                foreach($rightTh as $w)
                {
                    array_push($rightThighLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($rightThighCount, $w->value);
                }

                foreach($leftC as $w)
                {
                    array_push($leftCalfLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($leftCalfCount, $w->value);
                }

                foreach($rightC as $w)
                {
                    array_push($rightCalfLabels, $w->created_at->format('Y-m-d H:m:s'));
                    array_push($rightCalfCount, $w->value);
                }
        }

        $theWeightChart = new WeightChart;
        $theWeightChart->labels($weightLabels);
        $theWeightChart->dataset('Weight Data', 'line', $weightCount)
        ->backgroundColor('#34495e');


        $theWaistChart = new WeightChart;
        $theWaistChart->labels($waistLabels);
        $theWaistChart->dataset('Waist Data', 'line', $waistCount)
        ->backgroundColor('#2980b9');

        $theChestChart = new WeightChart;
        $theChestChart->labels($chestLabels);
        $theChestChart->dataset('Chest Data', 'line', $chestCount)
        ->backgroundColor('#f05252');

        $theNeckChart = new WeightChart;
        $theNeckChart->labels($neckLabels);
        $theNeckChart->dataset('Neck Data', 'line', $neckCount)
        ->backgroundColor('#8e44ad');

        $theUpperArmChart = new WeightChart;
        $theUpperArmChart->labels($leftUpperArmLabels, $rightUpperArmLabels);
        $theUpperArmChart->dataset('Left Upper arm Data', 'bar', $leftUpperArmCount)
        ->backgroundColor('#e74c3c');
        $theUpperArmChart->dataset('Right Upper arm Data', 'bar', $rightUpperArmCount)
        ->backgroundColor('#2980b9');

        $theLowerArmChart = new WeightChart;
        $theLowerArmChart->labels($leftLowerArmLabels, $rightLowerArmLabels);
        $theLowerArmChart->dataset('Left Lower arm Data', 'bar', $leftLowerArmCount)
        ->backgroundColor('#27ae60');
        $theLowerArmChart->dataset('Right Lower arm Data', 'bar', $rightLowerArmCount)
        ->backgroundColor('#f1c40f');
        
        $theThighChart = new WeightChart;
        $theThighChart->labels($leftThighLabels, $rightThighLabels);
        $theThighChart->dataset('Left thigh Data', 'bar', $leftThighCount)
        ->backgroundColor('#34495e');
        $theThighChart->dataset('Right thigh arm Data', 'bar', $rightThighCount)
        ->backgroundColor('#ecf0f1');

        $theCalfChart = new WeightChart;
        $theCalfChart->labels($leftCalfLabels, $rightCalfLabels);
        $theCalfChart->dataset('Left calf Data', 'bar', $leftCalfCount)
        ->backgroundColor('#1abc9c');
        $theCalfChart->dataset('Right calf arm Data', 'bar', $rightCalfCount)
        ->backgroundColor('#3498db');


        return view('dashboard', compact('theWeightChart', 'theWaistChart', 'theChestChart', 'theNeckChart', 'theUpperArmChart', 'theLowerArmChart', 'theThighChart', 'theCalfChart'));
    }
    
}
