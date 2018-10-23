<?php

namespace App\Http\Controllers;

use App\Http\Repository\ContactRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    private $contact;

    /**
     * ContactController constructor.
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contact = $contactRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('user.contact');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=1;
        $contacts = $this->contact->index();
//        if($contacts != null) return response()->json($courses);
//        return response()->json(['message'=>100]);
        return view('admin.courses.index',['contacts'=>$contacts, 'num'=>$num]);
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
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',
            'body' => 'required|min:40',
        ]);
        $isSaved=$this->contact->store($request);
        return redirect()->back()->with('status', 'You message was received successfully! Thanks for getting in touch with us we will get back to you as soon as we take a look at it.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $contact=$this->contact->show($slug);
//        return response()->json($course);
        return view('admin.departments.show',['contact'=>$contact]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $status = $this->contact->destroy($slug);
        return response()->json(['message'=>$status]);
//        return redirect('/admin/departments')->with('status', 'Department deleted successfully');
    }

}
