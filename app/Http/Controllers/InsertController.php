<?php

namespace App\Http\Controllers;

use App\Models\measurement;
use Illuminate\Http\Request;
use App\Models\measured_stat;
use App\Models\statistic_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InsertController extends Controller
{
    public function index() 
    {
        $statistics_type = statistic_type::get();
        return view('insert')->with('statistics', $statistics_type);
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $user_id = Auth::user()->id;
        //insert into measurements
        //one record created for the day, ideally
        $measurements = measurement::create([
            'user_id' => $user_id
            ]);
            
            for($i=1; $i<=12; $i++)
            {
                // $stat_ids = $request->input('stat_ids');
                // $statistics_type = statistic_type::find($stat_ids);
    
                //insert into measured_stats
                $measured_stats = measured_stat::create([
                    'value' => $request->input($i),
                    'measurement_id' => $measurements->id,
                    'stat_type_id' => $i
                ]);
    
            }
        


        Session::flash('message', 'Successfully added!'); 
        Session::flash('alert-class', 'text-success'); 

        return back();
        
        // var_dump($stat_ids);
    }
}
