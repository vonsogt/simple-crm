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
                ->editColumn('employee_id', function (Sell $sell) {
                    $employee = $sell->employee;
                    return $employee->first_name . ' ' . $employee->last_name;
                })
                ->addColumn('total', function ($row) {
                    $price = $row->price;
                    $discount_total = $price * $row->discount / 100;
                    $total = $price - $discount_total;

                    return round($total, 2);
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

    public function removeOldSellFromSellSummary($sell_id)
    {
        $sell = Sell::findOrFail($sell_id);

        // Get the old value
        $sell_price_old =    $sell ? $sell->price : 0;
        $sell_discount_old = $sell ? $sell->discount : 0;
        $sell_total_old =    $sell ? ($sell_price_old - ($sell_price_old * $sell_discount_old / 100)) : 0;

        $sell_summary = SellSummary::where('date', Carbon::make($sell->created_date)->format('Y-m-d'))
            ->where('employee_id', $sell->employee_id)->first();
        $is_exists_sell_summary = $sell_summary ? $sell_summary->exists() : false;

        // Create new sell_summary if doesn't have one
        if ($is_exists_sell_summary) {
            // Set the new value for update sell_summary
            $new_price_total =      $sell_summary->price_total - $sell_price_old;
            $new_discount_total =   $sell_summary->discount_total - $sell_discount_old;
            $new_total =            $sell_summary->total - $sell_total_old;

            $sell_summary->update([
                'last_update' =>    Carbon::now(),
                'price_total' =>    $new_price_total,
                'discount_total' => $new_discount_total,
                'total' =>          $new_total,
            ]);

            if ($sell_summary->price_total == 0)
                DB::table('sell_summaries')->delete($sell_summary->id);
        }
    }

    public function storeUpdateSellSummary($request, $sell_id = null)
    {
        $sell = $sell_id != null ? Sell::findOrFail($sell_id) : false;
        $now = Carbon::now();

        // Get the old value
        $sell_price_old =           $sell ? $sell->price : 0;
        $sell_discount_old =        $sell ? $sell->discount : 0;
        $sell_total_old =           $sell ? ($sell_price_old - ($sell_price_old * $sell_discount_old / 100)) : 0;
        $sell_created_date_old =    $sell ? Carbon::make($sell->created_date)->format('Y-m-d') : null;

        // Get the current value from request
        $price =        (int) $request->price;
        $discount =     $request->discount;
        $total =        $price - ($price * $discount / 100);
        $created_date =  Carbon::make($request->created_date . ':' . now()->format('s'));

        // Check if sell_created_date_old is different from created_date
        if ($sell_created_date_old != null && $created_date->format('Y-m-d') != $sell_created_date_old)
            $this->removeOldSellFromSellSummary($sell_id);

        // Create/Update relationship query
        $sell_summary = SellSummary::where('date', $created_date->format('Y-m-d'))
            ->where('employee_id', $request->employee_id)->first();
        $is_exists_sell_summary = $sell_summary ? $sell_summary->exists() : false;

        // Create new sell_summary if doesn't have one
        if (!$is_exists_sell_summary) {
            SellSummary::create([
                'date' =>           $created_date,
                'employee_id' =>    $request->employee_id,
                'created_date' =>   $now,
                'last_update' =>    $now,
                'price_total' =>    $price,
                'discount_total' => $discount,
                'total' =>          $total,
            ]);
        } else {
            // Set the new value for update sell_summary
            $new_price_total =      $sell_summary->price_total - $sell_price_old + $price;
            $new_discount_total =   $sell_summary->discount_total - $sell_discount_old + $discount;
            $new_total =            $sell_summary->total - $sell_total_old + $total;

            $sell_summary->update([
                'last_update' =>    $now,
                'price_total' =>    $new_price_total,
                'discount_total' => $new_discount_total,
                'total' =>          $new_total,
            ]);
        }
    }
}
