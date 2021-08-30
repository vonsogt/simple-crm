<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellRequest;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Sell;
use App\Models\SellSummary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sells = Sell::orderBy('id', 'DESC')->get();

            return DataTables::of($sells)
                ->addIndexColumn()
                ->editColumn('item_id', function (Sell $sell) {
                    return $sell->item->name;
                })
                ->editColumn('price', function (Sell $sell) {
                    return number_format($sell->price, 2);
                })
                ->editColumn('discount', function (Sell $sell) {
                    return $sell->discount . '%';
                })
                ->editColumn('employee_id', function (Sell $sell) {
                    $employee = $sell->employee;
                    return $employee->first_name . ' ' . $employee->last_name;
                })
                ->addColumn('total', function ($row) {
                    $price = $row->price;
                    $discount_total = $price * $row->discount / 100;
                    $total = $price - $discount_total;

                    return number_format(round($total, 2), 2);
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary mt-md-1" title="Show" href="' . route("admin.sell.show", [$row->id]) . '"><i class="far fa-eye"></i></a> ';
                    $btn .= '<a class="btn btn-success mt-md-1" title="Edit" href="' . route('admin.sell.edit', [$row->id]) . '"><i class="fas fa-edit"></i></a> ';
                    $btn .= '<a class="btn btn-danger mt-md-1" title="Delete" href="javascript:void(0)" onclick="deleteEntry(this)" data-route="' . route('admin.sell.destroy', [$row->id]) . '"><i class="far fa-trash-alt"></i></a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make();
        }

        $data['title'] = trans('simplecrm.sell.title');

        return view('admin.sells.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all()->pluck('name', 'id');
        $employees = Employee::select([
            'id',
            DB::raw('CONCAT(`first_name`, " ", `last_name`) as `name`')
        ])->get()->pluck('name', 'id');

        $data['items'] = $items;
        $data['employees'] = $employees;
        $data['title'] = trans('simplecrm.sell.title_singular');

        return view('admin.sells.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellRequest $request)
    {
        $sell = Sell::create($request->all());

        return redirect()->route('admin.sell.index')->with('message', trans('simplecrm.insert_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sell = Sell::findOrFail($id);

        $data['sell'] = $sell;
        $data['title'] = trans('simplecrm.sell.title_singular');

        return view('admin.sells.show', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sell = Sell::findOrFail($id);
        $items = Item::all()->pluck('name', 'id');
        $employees = Employee::select([
            'id',
            DB::raw('CONCAT(`first_name`, " ", `last_name`) as `name`')
        ])->get()->pluck('name', 'id');

        $data['items'] = $items;
        $data['employees'] = $employees;
        $data['sell'] = $sell;
        $data['title'] = trans('simplecrm.sell.title_singular');

        return view('admin.sells.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SellRequest $request, $id)
    {
        $sell = Sell::findOrFail($id);

        $sell->update($request->all());

        return redirect()->route('admin.sell.index')->with('message', trans('simplecrm.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell = Sell::findOrFail($id);

        return $sell->delete();
    }
}
