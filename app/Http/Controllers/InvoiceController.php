<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;

class InvoiceController extends Controller
{
 
    public function index()
    {          
        
        $invoice = Invoice::sortable()->orderby('team')->paginate(20);
        $num = count($invoice);
        return view('invoice.index',compact('invoice'))->with('i', (request()->input('page', 1) - 1) * 20)->with('num', $num);


    }

    public function create()
    {
        return view('invoice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'team' => 'required',
            'job_site' => 'required',
            'invoice' => 'required',
            'date' => 'required',
            'checker' => 'required',
        ]);
        $data = $request->all();
        $data['state'] = 'Waiting';
        
        Invoice::create($data);
        return redirect()->route('invoice.index')->with('success','invoice record created successfully.');
    }

    public function show(Invoice $invoice)
    {
        return view('invoice.show',compact('invoice'));
    }


    public function edit(Invoice $invoice)
    {
        return view('invoice.edit',compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'team' => 'required',
            'job_site' => 'required',
            'invoice' => 'required',
            'date' => 'required',
            'checker' => 'required',
        ]);
        $data = $request->all();
        $data['state'] = 'Waiting';
        $invoice->update($data);
        return redirect()->route('invoice.index')->with('success','invoice record updated successfully.');
    }


    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoice.index')->with('success','invoice record deleted successfully.');
    }

    public function getAjaxdatum(Request $request)
    {
        $team = $request->team;
        $job_site = $request->job_site;
        $date = $request->date;
        $checker = $request->checker;
        $filtered = Invoice::where('team','like', '%'.$team.'%')
                            ->where('job_site','like', '%'.$job_site.'%')
                            ->where('date','like', '%'.$date.'%')
                            ->where('checker','like', '%'.$checker.'%')
                            ->sortable()->get();
        return view('invoice.filtered_invoice')->with('filtered', $filtered);
    }

    public function ratifing(Request $request, Invoice $invoice)
    {
        if($request->action == 'ratify')
        {
            Invoice::where('id',$request->id)->update([
                'state'=>'Accepted'
            ]);
        }
        if($request->action == 'reject')
        {
            Invoice::where('id',$request->id)->update([
                'state'=>'Rejected'
            ]);
        }
    }
}