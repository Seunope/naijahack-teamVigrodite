<?php

namespace App\Http\Controllers;

use App\Http\Repository\TestimonyRepository;
use App\Testimony;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class TestimonyController extends Controller
{
    private $testimony;

    /**
     * TestimonyController constructor.
     */
    public function __construct(TestimonyRepository $testimonyRepository)
    {
        $this->testimony = $testimonyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testimony()
    {
        return view('user.testimony');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=1;
        $testimonies = $this->testimony->index();
//        return $testimonies;
//        if($testimonies != null) return response()->json($testimonies);
//        return response()->json(['message'=>100]);
        return view('admin.testimonies.index',['testimonies'=>$testimonies, 'num'=>$num]);
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
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:512',
        ]);
        $isSaved=$this->testimony->store($request);
        return redirect()->back()->with('status', 'You testimony was saved successfully! Thanks sharing your testimony with the world on sol.ng.');
    }

    public function update(Request $request, $slug)
    {
        $visibility=Testimony::where('slug','=',$slug)->get()->first();
        if($visibility->visibility) {
            Testimony::where('slug', $slug)->update(['visibility' => '0']);
        }
        else {
            Testimony::where('slug', $slug)->update(['visibility' => '1']);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $testimony=$this->testimony->show($slug);
//        return response()->json($testimony);
        return view('admin.testimonies.show',['testimony'=>$testimony]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $status = $this->testimony->destroy($slug);
        return response()->json(['message'=>$status]);
//        return redirect('/admin/departments')->with('status', 'Department deleted successfully');
    }

}
