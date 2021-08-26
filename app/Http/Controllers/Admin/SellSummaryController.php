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
            // Date Range filter
            if (!empty($request->get('date'))) {
                $date = explode(' - ', $request->get('date'));
                $from_date = $date[0];
                $to_date = $date[1];

                $sell_summaries = SellSummary::with(['employee', 'employee.company'])->whereBetween('date', [$from_date, $to_date])->orderBy('id', 'DESC')->get();
            } else {
                $sell_summaries = SellSummary::with(['employee', 'employee.company'])->orderBy('id', 'DESC')->get();
            }

            return DataTables::of($sell_summaries)
                ->addIndexColumn()
                ->editColumn('employee_id', function (SellSummary $sell_summary) {
                    $employee = $sell_summary->employee;
                    return $employee->first_name . ' ' . $employee->last_name;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary mt-md-1" title="Show" href="' . route("admin.sell-summary.show", [$row->id]) . '"><i class="far fa-eye"></i></a> ';

                    return $btn;
                })
                ->filter(function ($instance) use ($request) {
                    // Filter Employee
                    if (!empty($request->get('employee'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            $search_employee = strtolower($request->get('employee'));
                            $row_employee_name = strtolower($row['employee_id']);
                            return Str::contains($row_employee_name, $search_employee) ? true : false;
                        });
                    }

                    // Filter Company
                    if (!empty($request->get('company'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            $search_company = strtolower($request->get('company'));
                            $row_company_name = strtolower($row['employee']['company']['name']);
                            return Str::contains($row_company_name, $search_company) ? true : false;
                        });
                    }

                    // Default filter
                    if ($request->input('search.value') != "") {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            // The rows
                            $date = $row['date'];
                            $row_employee_name = strtolower($row['employee_id']);
                            $row_price_total = $row['price_total'];
                            $row_discount_total = $row['discount_total'];
                            $row_total = $row['total'];

                            return Str::containsAll(
                                strtolower($request->input('search.value')),
                                [$date, $row_employee_name, $row_price_total, $row_discount_total, $row_total]
                                // $row_employee_name,
                            ) ? true : false;
                        });
                    }
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
