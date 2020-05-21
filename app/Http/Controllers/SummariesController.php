<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Summary;
use App\Faculty;
class SummariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        // $events = Event::orderBy('id','desc')->get();
        // $event = Post::where('id','2')->get();
        // $posts = DB::select('SELECT * FROM posts');
        if (Auth::check()) {
        $data = array(
            'faculties'=>Faculty::orderBy('created_at','desc')->get(),
            'summaries' => Summary::orderBy('created_at','desc')->get()

        );
        return view('summaries.index')->with($data);
        }else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'faculties'=>Faculty::orderBy('created_at','desc')->get()
        );
        return view('summaries.create')->with($data);
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
            'title'=>'required',
            // 'category'=>'required'
        ]);
        
        
        //handle file upload
        $filenameToStore = "";
        if($request->hasFile('summary')){
            //Get file name with extentsion
            $filenameWithExt = $request->file('summary')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('summary')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore = $filename."_".time().".".$extension; // making the filename unique to prevent image overwriting

            //Upload image
            $path = $request->file('summary')->storeAs('public/summaries',$filenameToStore);
            

        }


        //create summary
        $summary = new Summary;
        $summary->title = $request->input('title');
        $summary->filename = $filenameToStore;
        $summary->category = ' ';
        //check user privilege
        if(auth()->user()->privilege=='admin'){
            $summary->status='accepted';
        }

        $summary->save();
        return redirect('/summaries/index')->with('success','تم رفع الملف');
        
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function test(){
        return view('/summaries/show');
    }
    public function show($id)
    {
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
        $summary = Summary::find($id);
        //check for user id
        if(auth()->user()->privilege == 'admin'){
            $summary->delete();
            return redirect('/summaries/index')->with('success','تم رفض الملخص');
        }
        return redirect('/summaries/index')->with('error',"Unauthorized User");
    }
    public function accept($id){
        $summary = Summary::find($id);
        //check for user id
        if(auth()->user()->privilege == 'admin'){
            $summary->status='accepted';
            $summary->save();
            return redirect('/summaries/index')->with('success','تم قبول الملخص');
        }
        return redirect('/summaries/index')->with('error',"Unauthorized User");
    }
}
