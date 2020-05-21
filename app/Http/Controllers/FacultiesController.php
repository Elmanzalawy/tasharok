<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Faculty;
use App\Book;
use App\News;
class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        // add authentication to faculties
        public function __construct()
        {
            //if user is guest, redirect to login screen except index and show views
            $this->middleware('auth',['except' => ['index','show']]);
        }
    
    public function home(){
        if (Auth::check()) {
            // The user is logged in...
            $data = array(
                'faculties'=>Faculty::orderBy('created_at','desc')->get(),
                'newsArray'=>News::orderBy('created_at','desc')->take(5)->get()
            );
            // $faculties = Faculty::orderBy('created_at','desc')->get();
            return view('index')->with($data);
        }else{
            return view('auth.login');
        }
    }
    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
            $data = array(
                'faculties'=>Faculty::orderBy('created_at','desc')->get(),
                'newsArray'=>News::orderBy('created_at','desc')->take(5)->get()
            );
            // $faculties = Faculty::orderBy('created_at','desc')->get();
            return view('faculties.index')->with($data);
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
        if(auth()->user()->privilege=='admin'){
            return view('faculties.create');
        }else{
            return back()->with('error','Unauthorized user.');
        }
    }
    public function createBook()
    {
        if(auth()->user()->privilege=='admin'){
            $data = array(
                'faculties'=>Faculty::orderBy('created_at','desc')->get()
            );
            return view('faculties.create-book')->with($data);
        }else{
            return back()->with('error','Unauthorized user.');
        }
    }
    public function createNews()
    {
        if(auth()->user()->privilege=='admin'){
            $data = array(
                'faculties'=>Faculty::orderBy('created_at','desc')->get()
            );
            return view('faculties.create-news')->with($data);
        }else{
            return back()->with('error','Unauthorized user.');
        }
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
            'name'=>'required',
            'image'=> 'image|nullable|max:10000'
        ]);
        //handle file upload
        $filenameToStore = "placeholder-image.png";
        if($request->hasFile('image')){
            //Get file name with extentsion
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore = $filename."_".time().".".$extension; // making the filename unique to prevent image overwriting

            //Upload image
            $path = $request->file('image')->storeAs('public/faculty_images',$filenameToStore);

        }
        else{
            // $fileNameToStore = "placeholder-image.png";
        }
        //create event
        $faculty = new Faculty;
        $faculty->name = $request->input('name');
        $faculty->image = $filenameToStore;
        $faculty->save();

        return redirect('/faculties')->with('success','تم اضافة التخصص');
    }

    public function storeBook(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'category'=> 'required'
        ]);

        //create book
        $book = new Book;
        $book->name = $request->input('name');
        $book->filename = ' ';
        $book->number = $request->input('number');
        $book->category = $request->input('category');
        $book->save();

        return redirect('/faculties')->with('success','تم اضافة الكتاب');
    }
    public function storeNews(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            // 'category'=> 'required'
        ]);
        $filenameToStore = 'placeholder-image.png';
        if($request->hasFile('image')){
            //Get file name with extentsion
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore = $filename."_".time().".".$extension; // making the filename unique to prevent image overwriting

            //Upload image
            $path = $request->file('image')->storeAs('public/news_images',$filenameToStore);

        }

        //create news
        $news = new News;
        $news->title = $request->input('title');
        $news->image = $filenameToStore;
        $news->description = $request->input('description');
        $news->save();

        return redirect('/faculties')->with('success','تم اضافة الأعلان');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculty = Faculty::find($id);
        $data = array(
            'faculty'=>Faculty::find($id),
            'books'=>Book::orderBy('number','desc')->where('category',$faculty->name)->get()
        );
        // $faculty = Faculty::find($id);
        // $books =  Book::orderBy('created_at','desc')->get();
        return view('faculties.show')->with($data);
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
