<?php

namespace App\Http\Controllers;

use App\Http\Repository\SuggestionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class SuggestionController extends Controller
{
    private $suggestion;

    /**
     * SuggestionController constructor.
     */
    public function __construct(SuggestionRepository $suggestionRepository)
    {
        $this->suggestion = $suggestionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suggestion()
    {
        return view('user.suggestion');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=1;
        $suggestions = $this->suggestion->index();
//        if($testimonies != null) return response()->json($testimonies);
//        return response()->json(['message'=>100]);
        return view('admin.suggestions.index',['suggestions'=>$suggestions, 'num'=>$num]);
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
        $isSaved=$this->suggestion->store($request);
        return redirect()->back()->with('status', 'You suggestion was received successfully! Thanks for getting in touch with us. ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $suggestion=$this->suggestion->show($slug);
//        return response()->json($testimony);
        return view('admin.departments.show',['suggestion'=>$suggestion]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $status = $this->suggestion->destroy($slug);
        return response()->json(['message'=>$status]);
//        return redirect('/admin/departments')->with('status', 'Department deleted successfully');
    }
}
