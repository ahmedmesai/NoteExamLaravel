<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $notes = Auth::user()->notes()->latest()->get();
        return view('notes.index')->with('notes', $notes);
    }

    public function create()
    {
        return view('notes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::id();
        Note::create($input);

        return redirect()->route('notes')->with('success', 'Note Added Successfully');
    }


    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show', compact('note'));
    }


    public function edit($id)
    {
        $note = Note::find($id);
        return view('notes.edit', compact('note'));
    }


    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();
        return redirect()->route('notes')->with('success', 'Note Updated Successfully');
    }


    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->back()->with('success', 'Note Deleted Successfully');
    }
}
