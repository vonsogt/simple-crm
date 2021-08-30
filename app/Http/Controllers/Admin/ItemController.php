<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $items = Item::orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addIndexColumn()
                ->editColumn('price', function (Item $item) {
                    return number_format($item->price, 2);
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary mt-md-1" title="Show" href="' . route("admin.item.show", [$row->id]) . '"><i class="far fa-eye"></i></a> ';
                    $btn .= '<a class="btn btn-success mt-md-1" title="Edit" href="' . route('admin.item.edit', [$row->id]) . '"><i class="fas fa-edit"></i></a> ';
                    $btn .= '<a class="btn btn-danger mt-md-1" title="Delete" href="javascript:void(0)" onclick="deleteEntry(this)" data-route="' . route('admin.item.destroy', [$row->id]) . '"><i class="far fa-trash-alt"></i></a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make();
        }

        $data['title'] = trans('simplecrm.item.title');

        return view('admin.items.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = trans('simplecrm.item.title_singular');

        return view('admin.items.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item = Item::create($request->all());

        return redirect()->route('admin.item.index')->with('message', trans('simplecrm.insert_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);

        $data['item'] = $item;
        $data['title'] = trans('simplecrm.item.title_singular');

        return view('admin.items.show', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        $data['item'] = $item;
        $data['title'] = trans('simplecrm.item.title_singular');

        return view('admin.items.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->update($request->all());

        return redirect()->route('admin.item.index')->with('message', trans('simplecrm.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('items')->delete($id);
    }
}
