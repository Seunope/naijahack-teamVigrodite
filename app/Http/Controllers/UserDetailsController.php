<?php

namespace App\Http\Controllers;

use App\Phone;
use App\User;
use App\Credit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Auth;
class UserDetailsController extends Controller
{
    /**
     * edit user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function update(Request $request, $slug)
    {
        if (Auth::check())
        {
//            $this->validate($request, [
//                'number' => 'required|unique:phones|numeric|digits_between:11,15',
//            ]);
            $user = User::whereSlug($slug)->get()->first();
            $phone = new Phone();
            $phone->slug = uniqid();
            $phone->user_id = $request->user_id;
            $phone->number = $request->number;
            $phone->save();

            $credit = new Credit();
            $credit->slug = uniqid();
            $credit->user_id = $request->user_id;
            $credit->save();

            $user->department_id = $request->department_id;
            $user->level_id = $request->level_id;
            $user->phone_id = $phone->id;
            $user->credit_id = $credit->id;
            $isUpdated = $user->update();
            return redirect('/')->with('status', 'Hi! '.$user->name.', welcome to sol.ng your registration was completed successfully!');
            ;
        }
        return redirect('/login');
    }/**
 * edit user instance after a valid registration.
 *
 * @param  array  $data
 * @return User
 */
    protected function update_profile(Request $request, $slug)
    {
        $user = User::whereSlug($slug)->get()->first();
        if ($request->name != $user->name) {
            $this->validate($request, ['name' => 'required|unique:users|max:30',]);
            $user->name = $request->name;
        }
        if (isset(Auth::user()->phone) && $request->number != $user->phone->number) {
//            $this->validate($request, ['number' => 'required|unique:phones|max:15',]);
            Phone::where('user_id', $user->id)->update(['number' => $request->number]);
        }
        if (!isset(Auth::user()->phone)) {
            $phone = new Phone();
            $phone->slug = uniqid();
            $phone->user_id = $request->user_id;
            $phone->number = $request->number;
            $phone->save();
        }

        if ($request->file != null) {
            $this->validate($request, ['file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:300']);
            if (!isset($user->path)) {
                unlink(public_path().$user->path);
                $user->update(['path' =>'']);
//                File::delete($user->path);
            }
            $destination = public_path() . "/User_images/";
            if($file=$request->file('file')) {
                $filename = time().$file->getClientOriginalName();
                $file->move($destination, $filename);
            }
            $user->path   = "/User_images/" . $filename;
        }
        $user->department_id = $request->department_id;
        $user->level_id = $request->level_id;
        $isUpdated = $user->update();
        return redirect('/profile')->with('status', 'profile updated successfully');
    }
}
