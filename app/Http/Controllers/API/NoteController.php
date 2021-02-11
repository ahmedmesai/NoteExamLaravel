<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NoteController extends BaseController
{

    public function index()
    {
        $notes = Auth::user()->notes()->latest()->paginate(10);
        // dd($notes);
        return $this->sendResponse($notes, 'Notes Retrivied Successfully');
    }


    public function store(Request $request)
    {
        $validatar = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($validatar->fails()) {
            return $this->sendError('Validate Error', $validatar->errors());
        }

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $note = Note::create($input);

        return $this->sendResponse($note, 'Note Created Successfully');
    }


    public function show($id)
    {
        $note = Note::find($id);
        if (!is_null($note)) {
            if ($note->user_id === Auth::id()) {
                return $this->sendResponse($note, 'Note Showed Successfully');
            } else {
                return $this->sendError('You do not have right accessing this note');
            }
        } else {
            return $this->sendError('Can Not Find This Note');
        }
    }


    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        if (!is_null($note)) {
            $validatar = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required'
            ]);

            if ($validatar->fails()) {
                return $this->sendError('Validate Error', $validatar->errors());
            }

            if ($note->user_id === Auth::id()) {
                $note->title = $request->title;
                $note->content = $request->content;
                $note->save();
                return $this->sendResponse($note, 'Note Updated Successfully');
            } else {
                return $this->sendError('You do not have right updating this note');
            }
        } else {
            return $this->sendError('Can Not Find This Note');
        }
    }


    public function destroy($id)
    {
        $note = Note::find($id);
        if (!is_null($note)) {
            if ($note->user_id === Auth::id()) {
                $note->delete();
                return $this->sendResponse($note, 'Note Deleted Successfully');
            } else {
                return $this->sendError('You do not have right deleting this note');
            }
        } else {
            return $this->sendError('Can Not Find This Note');
        }
    }
}
