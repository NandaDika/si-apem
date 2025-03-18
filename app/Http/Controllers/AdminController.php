<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function getUsers(){
        $data = User::all();
        //dd($data);
        return view('admin.listuser', ['users' => $data]);
    }

    public function import(Request $request){
        $users = $request->input('users');

        foreach ($users as $user) {
            User::create([
                'id' => $user['id'],
                'nama' => $user['nama'] ?? '',
                'role' => $user['role'] ?? '',
                'poin' => 0,
                'kode_guru' => $user['kode_guru'],
                'password' => bcrypt($user['password'] ?? 'siapem001'),
                'link_dapodik' => $user['link_dapodik']
            ]);
        }

    return redirect()->back()->with('reload', true);
    }

    public function deleteMultiple(Request $request){
        $ids = $request->input('ids');

        if ($ids) {
            User::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected users have been deleted.');
        }

        return redirect()->back()->with('error', 'No users selected.');
    }
}
