<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Charger\StoreRequest;
use App\Http\Requests\Admin\Charger\UpdateRequest;
use App\Models\Charger;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChargersController extends Controller
{
    public function index()
    {
        return view('admin.charger.index');
    }

    public function create()
    {
        return view('admin.charger.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Charger::create($data);

        return redirect()->route('admin.charger.index');
    }

    public function edit(Charger $charger)
    {
        return view('admin.charger.edit', compact('charger'));
    }

    public function update(UpdateRequest $request, Charger $charger)
    {
        $data = $request->validated();
        $data = array_filter($data);

        $charger->update($data);

        return view('admin.charger.index');
    }

    public function delete(Charger $charger)
    {
        $charger->delete();

        return redirect()->route('admin.charger.index');
    }

    public function data()
    {
        $chargers = Charger::all();

        return DataTables::of($chargers)
            ->editColumn('power', function($charger) {
                return $charger->power . ' КВТ';
            })
            ->editColumn('busy', function($charger) {
                return $charger->busy ? 'Да' : 'Нет';
            })
            ->editColumn('created', function($charger) {
                return date('Y-m-d H:i:s', strtotime($charger->created_at));
            })
            ->addColumn('actions', function($charger) {

                $edit = '<a href="' . route('admin.charger.edit', $charger->id) . '" class="btn btn-primary mr-2">Изменить</a>';
                $delete = '<form style="display:inline-block;" action="' . route('admin.charger.delete', $charger->id) . '" method="post">' . csrf_field() . method_field('DELETE') . '<input type="submit" class="btn btn-danger" value="Удалить"></form>';

                return $edit . $delete;
            })->rawColumns(['actions'])->make(true);
    }
}
