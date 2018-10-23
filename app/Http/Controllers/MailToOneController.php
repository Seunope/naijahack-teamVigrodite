<?php

namespace App\Http\Controllers;

use App\Mail;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class MailToOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails=Mail::where('indexNumber',1)->get()->all();
        return view('mailToOne.index',['mails'=>$mails,'num'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role_id==1)
        {
            $users=User::lists('name','id');
        }
        return view('mailToOne.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);
        $mail                     =   new Mail();
        $mail->body               =   $request->body;
        $mail->user_id            =   Auth::user()->id;
        $mail->subject        =   $request->subject;
        $mail->to_id        =   $request->to_id;
        $mail->to        =   User::findOrFail($request->to_id)->name;
        $mail->indexNumber        =   1;
        $mail->slug               =   uniqid();
        $isSaved                     =   $mail->save();
        return redirect('/mailToOne')->with('status', 'Your mail was sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
