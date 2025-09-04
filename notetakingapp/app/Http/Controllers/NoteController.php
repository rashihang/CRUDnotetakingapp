<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return response()->json(auth()->user()->notes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = auth()->user()->notes()->create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($note, 201);
    }

    public function show($id)
    {
        $note = auth()->user()->notes()->findOrFail($id);
        return response()->json($note);
    }

    public function update(Request $request, $id)
    {
        $note = auth()->user()->notes()->findOrFail($id);
        $note->update($request->only('title', 'content'));

        return response()->json($note);
    }

    public function destroy($id)
    {
        $note = auth()->user()->notes()->findOrFail($id);
        $note->delete();

        return response()->json(['message' => 'Note deleted']);
    }
}
