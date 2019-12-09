<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Note::orderBy('priority', 'DESC')->paginate(5);
        return view('index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'note_title' => 'required',
            'note_description' => 'required'
        ]);

        $form_data = array(
            'title' => $request->note_title,
            'description' => $request->note_description,
            'priority' => $request->note_priority
        );

        Note::create($form_data);

        return redirect('note')->with('success', 'Note added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Note::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Note::findOrFail($id);
        return view('edit', compact('data'));
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
        $request->validate([
            'note_title' => 'required',
            'note_description' => 'required'
        ]);

        $form_data = array(
            'title' => $request->note_title,
            'description' => $request->note_description,
            'priority' => $request->note_priority
        );

        Note::whereId($id)->update($form_data);
        return redirect('note')->with('success', 'Note is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Note::findOrFail($id);
        $data->delete();
        return redirect('note')->with('success', 'Note is successfully deleted');
    }
}
