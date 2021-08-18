<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;
use DataTables;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $language_line = LanguageLine::all();

            return Datatables::of($language_line)
                ->addIndexColumn()
                // ->editColumn('text', function (LanguageLine $lang) {
                //     $row = [];
                //     foreach ($lang->text as $key => $value) {
                //         $row[] = '<span class="right badge badge-primary" style="width: 2rem;">' . $key . '</span> ' . $value;
                //         // $row[] = 'jehe';
                //     }
                //     return implode('<br>', $row);
                // })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-primary" title="Show" href="' .
                        route("admin.translation.show", [$row->id]) .
                        '"><i class="far fa-eye"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('admin.translations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language_line = LanguageLine::findOrFail($id);

        $data['language_line'] = $language_line;
        $data['title'] = trans('simplecrm.translation.title');

        return view('admin.translations.show', compact('data', 'id'));
    }
}
