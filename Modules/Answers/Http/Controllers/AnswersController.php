<?php

namespace Modules\Answers\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Answers\Http\Requests\Answers\StoreRequest;
use Modules\Answers\Entities\Answer;
use Modules\Questions\Entities\Question;
use Modules\Answers\Http\Requests\Answers\UpdateRequest;

class AnswersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreRequest $request, Question $question)
    {
        $data = $request->all();
        // dd($data);
        $user = $request->user();
        $data['user_id'] = $user->id;
        
        $questions = Answer::create($data);
        return back()
        ->withSuccessMessage('Answer has been posted.');

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $answer = Answer::find($id);
        // dd($answer);
        return view('answers::frontend.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateRequest $request,Question $question, $id)
    {
        $data = $request->except(['_token','_method']);
        // $que= $question->all();
        // // $haha = $que->slug;
        // foreach ($que as $qu) {
        //     $haha = $qu->slug;
        // }
        // dd($haha);
        $answer = Answer::where(['id' => $id])->update($data);
        // dd($answer);
        if ($answer) {
            // return redirect()->route('ask.show',$question->slug)
            return redirect()->back()
                ->withSuccessMessage('Answer is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Answer can not be updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        // $delete = array(
        //     'status' => 2
        // );
        // dd($delete);
        $answer = Answer::destroy($id);
      
        if ($answer) {
            return redirect()->route('home')->withSuccessMessage('Your Answer has been deleted.');
        }
    }
}
