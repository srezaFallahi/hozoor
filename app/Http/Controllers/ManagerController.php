<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerRequest;
use App\Http\Requests\TeacherRequest;
use App\Manager;
use App\Role;
use App\Teacher;
use App\User;
use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $manager_id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('adminPage:Manager-controller', ['except' => ['store', 'create']]);
    }

    public function index()
    {
        $managers=Manager::paginate(7);
        $num = 1;
        return view('admin.admin.manager-admin',compact('managers','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
// return 1 ;

        $grades = Grade::all()->where('manager_id','=',5);
        // dd($grades);
        return view('admin.manager-admin.add',compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        $id = $user->id;
        $role = Role::find(2);
        $user = User::find($id);
        $user->roles()->save($role);
        Manager::create()->users()->save($user);
        return redirect('/login');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $managerTemp = Manager::find($id);

        return view('admin.manager-admin.edit', compact('managerTemp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $manager = Manager::find($id);
        $id = $manager->id;
        $data['password'] = Hash::make($request['password']);
        foreach ($manager->users as $user) {
            $user->update($data);
        }
        Session::flash('massage', 'مدیر ویرایش شد.');
        return redirect('/manager');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
