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

        //find user data and prefill form

        return view('insert')->with('statistics', $statistics_type);
    }

    public function save(Request $request)
    {

        $customMessages = [
            'required' => 'Please enter :attribute '
        ];

        $rules = [
            '0' => 'null',
            '1' => 'required | Integer',
            '2' => 'required | Integer',
            '3' => 'required | Integer',
            '4' => 'required | Integer',
            '5' => 'required | Integer',
            '6' => 'required | Integer',
            '7' => 'required | Integer',
            '8' => 'required | Integer',
            '9' => 'required | Integer',
            '10' => 'required | Integer',
            '11' => 'required | Integer',
            '12' => 'required | Integer'
        ];

        $validatedData = $request->validate($rules, $customMessages);
        //validate
        // for($i=1;$i<=12; $i++)
        // {
        //     $validatedData = $request->validate([
        //         $i => 'required'
        //     ]);
        // }
        
        //find neccessary atributes 
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
        Session::flash('alert-class', 'text-teal-900'); 

        return back();
        
        // var_dump($input);
    }

    public function edit()
    {
        $measurements = measurement::get()->where('user_id', Auth::user()->id);
        return view('edit')->with('measurements', $measurements);
    }

    public function editWithId($id)
    {
        $statistics_type = statistic_type::get();

        //find the measurement record
        $measurements = measured_stat::get()->where('measurement_id', $id);

        //return view with data
        return view('editMeasurement')->with([
            'measurements' => $measurements
        ]);
    }

    public function editSubmit(Request $request)
    {
        //update the request

        //find the measurement record
        //update the measured stats using the measurement id

        $input = $request->all();

        $measurement_id = $request->input('measurement_id');
        $measured_stats = measured_stat::get()->where('measurement_id', $measurement_id);
        $n = 1;

            foreach($measured_stats as $measured_stat)
            {
                $measured_stat->value = $request->input('val'.$n);                
                $n++;
                $measured_stat->save();
            }
        


        Session::flash('message', 'Successfully saved!'); 
        Session::flash('alert-class', 'text-teal-900'); 

        return back();


    }

    public function delete($id)
    {
        //find the measurement record
        $measurements = measured_stat::get()->where('measurement_id', $id);
        
        //delete each one 
            foreach($measurements as $meas)
            {
                $meas->delete();                
            }        

        //delete from the measurements
        $measurement = measurement::get()->where('id', $id)->first();
        $measurement->delete();

        Session::flash('message', 'Successfully Deleted!'); 
        Session::flash('alert-class', 'text-teal-900'); 

        return back();
    }
}
