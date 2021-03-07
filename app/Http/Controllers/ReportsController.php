<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;

class ReportsController extends Controller
{
 
    public function index()
    {          
        date_default_timezone_set("Asia/Seoul");
        $reports = Report::where('date',Carbon::today()->format('Y-m-d'))->orderby('team','asc')->sortable()->paginate(20);
        $num = count($reports);
        // return $num;
        return view('reports.index',compact('reports'))->with('i', (request()->input('page', 1) - 1) * 20)->with('num', $num);


    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'total_hours' => 'required',
            'description' => 'required',
            'task_hours' => 'required'
        ]);
        $data = $request->all();
        $data['state'] = 'Waiting';
        
        Report::create($data);
        return redirect()->route('reports.index')->with('success','report created successfully.');
    }

    public function show(Report $report)
    {
        return view('reports.show',compact('report'));
    }


    public function edit(Report $report)
    {
        return view('reports.edit',compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'total_hours' => 'required',
            'description' => 'required',
            'task_hours' => 'required'
        ]);
        $data = $request->all();
        $data['state'] = 'Waiting';
        $report->update($data);
        return redirect()->route('reports.index')->with('success','Report updated successfully.');
    }


    public function destroy(Report $Report)
    {
        $Report->delete();
        return redirect()->route('reports.index')->with('success','Report deleted successfully.');
    }

    public function getAjaxdatum(Request $request)
    {
        $date = $request->date;
        $name = $request->name;
        $team = $request->team;
        $filtered = Report::where('date','like', '%'.$date.'%')
                            ->where('name','like', '%'.$name.'%')
                            ->where('team','like', '%'.$team.'%')
                            ->sortable()->orderby('team','asc')->get();
                            // return $filtered;
        $flag = count($filtered);
        return view('reports.filtered_report')->with('flag', $flag)->with('filtered', $filtered)->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function ratifing(Request $request, Report $report)
    {
        if($request->action == 'ratify')
        {
            Report::where('id',$request->id)->update([
                'state'=>'Accepted'
            ]);
        }
        if($request->action == 'reject')
        {
            Report::where('id',$request->id)->update([
                'state'=>'Rejected'
            ]);
        }
    }
}