<?php

namespace App\Http\Controllers;

use App\Http\Repository\ViewRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
    private $view;

    /**
     * ViewController constructor.
     */
    public function __construct(ViewRepository $viewRepository)
    {
        $this->view = $viewRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isSaved=$this->view->store($request);
        return "Yes it passed here";
        if(isset($request->edit)) {
            return redirect('/general/questions/'.$request->slug)->with('edit','1');
        }
        return redirect('/general/questions/'.$request->slug);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeForAdmin(Request $request)
    {
        $slug=$request->slug;
        // return $slug;
        $isSaved=$this->view->store($request);
        return redirect('admin/questions/'.$slug);
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
