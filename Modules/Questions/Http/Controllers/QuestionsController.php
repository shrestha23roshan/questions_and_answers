<?php

namespace Modules\Questions\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Questions\Entities\Question;
use Modules\Questions\Http\Requests\Questions\StoreRequest;
use Modules\Questions\Http\Requests\Questions\UpdateRequest;
use Modules\Answers\Entities\Answer;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $questions = Question::all();
        // dd($questions); 
        return view('questions::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('questions::frontend.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreRequest $request)
    {
        $destinationpath = 'uploads/questions/';

        $data = $request->except('_token', 'image');
        $user = $request->user();
        $data['user_id'] = $user->id;

        $imageFile = $request->image;
        if ($imageFile) {
            $extension = $imageFile->getClientOriginalName();
            $new_file_name = "question_" . time();
            $image = $imageFile->move($destinationpath, $new_file_name . $extension);
            $data['image'] = isset($image) ? $new_file_name . $extension : NULL;
        }
        // dd($data);
        $questions = Question::create($data);
        return redirect()->route('home')
            ->withSuccessMessage('Question have been posted.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Question $question)
    {
        $question->increment('views');

        $answers = Answer::orderBy('created_at', 'desc')->get();
        // dd($question);
        return view('questions::frontend.show', compact('question','answers'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $question = Question::find($id);
        // dd($question);
        return view('questions::frontend.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except(['_token','_method']);
// dd($data);
        $questions = Question::where(['id' => $id])->update($data);
        // dd($questions);
        if ($questions) {
            return redirect()->route('home')
                ->withSuccessMessage('Question is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Question can not be updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        // $d = array(
        //     'status' => 2
        // );
        // $question = Question::where('id',$id)->update($d);

        $question = Question::destroy($id);
        if ($question) {
            return redirect()->route('home')->withSuccessMessage('Your Question has been deleted.');
        }
    }
}
