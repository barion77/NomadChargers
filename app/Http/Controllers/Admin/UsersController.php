<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data = array_filter($data);

        $user->update($data);

        return view('admin.user.index');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index');
    }

    public function data()
    {
        $users = User::all();

        return DataTables::of($users)
            ->editColumn('verification', function($user) {
                return !empty($user->email_verified_at) ? 'Да' : 'Нет';
            })
            ->editColumn('created', function($user) {
                return date('Y-m-d H:i:s', strtotime($user->created_at));
            })
            ->addColumn('actions', function($user) {

                $edit = '<a href="' . route('admin.user.edit', $user->id) . '" class="btn btn-primary mr-2">Изменить</a>';
                $delete = '<form style="display:inline-block;" action="' . route('admin.user.delete', $user->id) . '" method="post">' . csrf_field() . method_field('DELETE') . '<input type="submit" class="btn btn-danger" value="Удалить"></form>';

                return $edit . $delete;
            })->rawColumns(['actions'])->make(true);
    }
}
