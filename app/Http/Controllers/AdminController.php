<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Summary;
use App\Faculty;
use App\Event;
use App\News;
use App\Book;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->privilege=='admin'){
            $data = array(
                'faculties'=>Faculty::orderBy('created_at','desc')->get(),
                'summaries'=>Summary::orderBy('created_at','desc')->get(),
                'books'=>Book::orderBy('created_at','desc')->get(),
                'events'=>Event::orderBy('created_at','desc')->get(),
                'newsArray'=>News::orderBy('created_at','desc')->take(5)->get()
            );
            return view('dashboard.index')->with($data);
        }else{
            return redirect('index')->with('error','دخول غير مصرح.');
        }
    }
    public function deleteNews($id){
        $news = News::find($id);
        $news->delete();
        return redirect('dashboard')->with('success','تم مسح الأعلان.');

    }
    public function deleteEvent($id){
        $event = Event::find($id);
        $event->delete();
        return redirect('dashboard')->with('success','تم مسح الدورة.');

    }
    public function deleteSummary($id){
        $summary = Summary::find($id);
        $summary->delete();
        return redirect('dashboard')->with('success','تم مسح الملخص.');

    }
    public function deleteBook($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('/faculties/index')->with('success','تم مسح الكتاب.');
    }
    public function editBook(Request $request, $id){
        $book = Book::find($id);
        $book->number = $request->number;
        $book->save();
        return redirect('/faculties/index')->with('success','تم تعديل الكتاب.');
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
        //
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
