<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Faculty;
use App\Book;
use App\Summary;
class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
        // The user is logged in...
        $query = $request->get('query');

        $faculties = Faculty::where('name', 'LIKE', "%$query%")->get();

        $books = Book::where('name', 'LIKE', "%$query%")->orWhere('category', 'LIKE', "%$query%")->get();

        $summaries = Summary::where('title', 'LIKE', "%$query%")->orWhere('category', 'LIKE', "%$query%")->get();

        return view('search', compact('faculties','books','summaries'));
        }else{
            return view('auth.login');
        }
    }   
}
