<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SellSummary;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
            $sell_summaries = SellSummary::orderBy('id', 'DESC')->get();

            return DataTables::of($sell_summaries)
                ->addIndexColumn()
                ->editColumn('employee_id', function (SellSummary $sell_summary) {
                    $employee = $sell_summary->employee;
                    return $employee->first_name . ' ' . $employee->last_name;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary mt-md-1" title="Show" href="' . route("admin.sell.show", [$row->id]) . '"><i class="far fa-eye"></i></a> ';

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
        //
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
