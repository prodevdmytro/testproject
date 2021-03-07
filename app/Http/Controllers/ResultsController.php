<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;

class ResultsController extends Controller
{
 
    public function index()
    {          

        $results = Result::sortable()->orderby('completed_time')->get();
        $num = count($results);
        return view('results.index',compact('results'))->with('i', (request()->input('page', 1) - 1) * 20)->with('num', $num);


    }

    public function create()
    {
        return view('results.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'proj_id' => 'required',
            'proj_name' => 'required',
            'team' => 'required',
            'bidding_time' => 'required',
            'award_time' => 'required',
            'acept_time' => 'required',
            'member' => 'required',
            'client_info' => 'required',
            'price' => 'required',
            'completed_time' => 'required'
        ]);
        $data = $request->all();
        $data['state'] = 'Waiting';
        
        Result::create($data);
        return redirect()->route('results.index')->with('success','result created successfully.');
    }

    public function show(Result $report)
    {
        return view('results.show',compact('report'));
    }


    public function edit(Result $result)
    {
        return view('results.edit',compact('result'));
    }

    public function update(Request $request, Result $result)
    {
        $request->validate([
            'proj_id' => 'required',
            'proj_name' => 'required',
            'team' => 'required',
            'bidding_time' => 'required',
            'award_time' => 'required',
            'acept_time' => 'required',
            'member' => 'required',
            'client_info' => 'required',
            'price' => 'required',
            'completed_time' => 'required'
        ]);
        $data = $request->all();
        $data['state'] = 'Waiting';
        $result->update($data);
        return redirect()->route('results.index')->with('success','Result updated successfully.');
    }


    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('results.index')->with('success','Result deleted successfully.');
    }

    public function getAjaxdatum(Request $request)
    {
        $proj_id = $request->proj_id;
        $proj_name = $request->proj_name;
        $client_info = $request->client;
        $member = $request->member;
        $team = $request->team;
        // return $client_info;
        $filtered = Result::where('proj_id','like', '%'.$proj_id.'%')
                            ->where('proj_name','like', '%'.$proj_name.'%')
                            ->where('team','like', '%'.$team.'%')
                            ->where('client_info','like', '%'.$client_info.'%')
                            ->where('member','like', '%'.$member.'%')
                            ->orderby('completed_time')
                            ->sortable()->get();
        return view('results.filtered_result')->with('filtered', $filtered);
    }

    public function ratifing(Request $request, Result $result)
    {
        if($request->action == 'ratify')
        {
            Result::where('id',$request->id)->update([
                'state'=>'Accepted'
            ]);
        }
        if($request->action == 'reject')
        {
            Result::where('id',$request->id)->update([
                'state'=>'Rejected'
            ]);
        }
    }
}