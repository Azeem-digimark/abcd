<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{   
    public function changeRole(Request $req)
    {
        User::where('id', $req->userId)->update(
            [
                'role_id' => $req->roleId,
            ]
        );

        return redirect()->back()->with('msg', 'Role Changed Successufully!');
    }

    //returns all users
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            $data = User::with('role')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($user) {
                    $roles = Role::all();

                    $select = '<form method="post" action="'.route('changeRole').'">'.csrf_field().'<input type="hidden" name="userId" value="'.$user->id.'"><select name="roleId" id="roleId" onchange="this.form.submit()">';
                    if (count($roles)) {
                        
                        foreach($roles as $role){
                            $selected = '';
                            if($role->id == $user->role_id){
                                $selected = 'selected';
                            }
                            $select .= '<option value="'.$role->id.'" '.$selected.'>'.$role->name.'</option>';
                        }

                    } else {
                        $select .= '<option value="">No Salary Cycle Found!</option>';
                    }
                    $select .= '</select></form>';
                    return $select;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('users.userListing');
    }
}
