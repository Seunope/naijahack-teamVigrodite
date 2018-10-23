<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Credit;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $num = 1;
            $users = User::all();
//        return response()->json($users);
            return view('admin.users.index', ['users' => $users, 'num' => $num]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
    public function show($slug)
    {
            $user = User::whereSlug($slug)->get()->first();
//        return response()->json($faculty);
            return view('admin.users.show', ['user' => $user]);
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function visibility(Request $request)
    {
        $visibility=User::where('slug','=',$request->slug)->get()->first();
        if($visibility->visibility) {
            User::where('slug', $request->slug)->update(['visibility' => '0']);
        }
        else {
            User::where('slug', $request->slug)->update(['visibility' => '1']);
        }
        return redirect()->back();
    }

    public function credit(Request $request)
    {
        $credit                     =   Credit::where('slug','=',$request->slug)->get()->first();
        $value                      =   $request->value;
        // return $credit;
        $credit->value = $credit->value+$value;
        $credit->update();
            Session::flash('status',$value.'coin has been added to this guys account.');
            return redirect()->back();
    }
}
