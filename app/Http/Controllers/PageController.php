<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard() { return view('dashboard'); }
    public function profile()   { return view('profile'); }
    public function progress()  { return view('progress'); }
    public function settings()  { return view('settings'); }

    public function vocabulary() { return view('vocabulary'); }
    public function grammar()    { return view('grammar'); }
    public function listening()  { return view('listening'); }
    public function speaking()   { return view('speaking'); }
    public function reading()    { return view('reading'); }
    public function writing()    { return view('writing'); }

    public function exercises()  { return view('exercises'); }
    public function flashcards() { return view('flashcards'); }
    public function exams()      { return view('exams'); }
    public function leaderboard(){ return view('leaderboard'); }
}
