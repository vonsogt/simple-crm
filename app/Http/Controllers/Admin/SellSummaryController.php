<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sell;
use App\Models\SellSummary;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SellSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $sell_summaries = new SellSummary();

            // Date Range filter
            if (!empty($request->get('date'))) {
                $date = explode(' - ', $request->get('date'));
                $from_date = $date[0];
                $to_date = $date[1];

                $sell_summaries = $sell_summaries->whereBetween('date', [$from_date, $to_date]);
            }

            // Employee filter
            if (!empty($search_employee = $request->get('employee'))) {
                $sell_summaries = $sell_summaries->whereHas('employee', function ($query) use ($search_employee) {
                    return $query->where('first_name', 'LIKE', "%$search_employee%")
                        ->orWhere('last_name', 'LIKE', "%$search_employee%");
                });
            }

            // Company filter
            if (!empty($search_company = $request->get('company'))) {
                $sell_summaries = $sell_summaries->whereHas('employee', function ($query) use ($search_company) {
                    return $query->whereHas('company', function ($q) use ($search_company) {
                        return $q->where('name', 'LIKE', "%$search_company%");
                    });
                });
            }

            return DataTables::of($sell_summaries->orderBy('id', 'DESC')->get())
                ->addIndexColumn()
                ->editColumn('employee_id', function (SellSummary $sell_summary) {
                    $employee = $sell_summary->employee;
                    return $employee->first_name . ' ' . $employee->last_name;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary mt-md-1" title="Show" href="' . route("admin.sell-summary.show", [$row->id]) . '"><i class="far fa-eye"></i></a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make();
        }

        $data['title'] = trans('simplecrm.sell_summary.title');

        return view('admin.sell_summaries.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sell_summary = SellSummary::with(['employee', 'employee.company'])->findOrFail($id);
        $sells = Sell::with('item')->where('created_date', 'LIKE', $sell_summary->date . '%')
            ->where('employee_id', $sell_summary->employee_id)->get();

        $data['sell_summary'] = $sell_summary;
        $data['sells'] = $sells;
        $data['title'] = trans('simplecrm.sell_summary.title_singular');

        return view('admin.sell_summaries.show', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
