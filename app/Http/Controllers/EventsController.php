<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Event;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // add authentication to events
    public function __construct()
    {
        //if user is guest, redirect to login screen except index and show views
        $this->middleware('auth',['except' => ['index','show']]);
    }


    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
        $events = Event::orderBy('created_at','desc')->get();
        return view('events.index')->with('events',$events);
        // return view('events.index');
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
        return view('events.create');
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
            // 'description'=>'required',
            'cover_image'=> 'image|nullable|max:10000'
        ]);
        //handle file upload
        $filenameToStore = "placeholder-image.png";
        if($request->hasFile('cover_image')){
            //Get file name with extentsion
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore = $filename."_".time().".".$extension; // making the filename unique to prevent image overwriting

            //Upload image
            $path = $request->file('cover_image')->storeAs('public/event_images',$filenameToStore);

        }
        else{
            // $fileNameToStore = "placeholder-image.png";
        }
        //create event
        $event = new Event;
        $event->title = $request->input('title');
        $event->cover_image = $filenameToStore;
        // $event->description = $request->input('description');
        $event->description = ' ';
        $event->event_date = $request->input('event_date');

        $event->save();

        return redirect('/events/index')->with('success','تم اضافة الدورة');
        
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
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
