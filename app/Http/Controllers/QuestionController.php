<?php

namespace App\Http\Controllers;

use App\Models\OrganisationModel;
use App\Models\QuestionModel;
use App\Models\SubstationModel;
use App\Models\TestQuestionModel;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question(Request $request)
    {
        $organisation_name = OrganisationModel::first();
        $id = $request->route('id'); // Test ID'yi route üzerinden alıyoruz
        $testQuestions = TestQuestionModel::where('test_id', $id)->pluck('question_id'); // question_id'leri topluca alıyoruz
        $questions = QuestionModel::whereIn('id', $testQuestions)->get(); // Tüm ilgili soruları alıyoruz
        return view("admin_panel.question", compact('organisation_name', 'questions', 'id'));
    }



    // public function update(Request $request)
    // {
    //     $question = QuestionModel::find($request->id);
    //     $question->name = $request->name;
    //     $question->phone = $request->phone;
    //     $question->address = $request->address;
    //     $question->maps = $request->maps;
    //     $question->save();

    //     return redirect()->back()->with('success', 'Şube  başarıyla güncellendi!');
    // }
    // public function delete(Request $request)
    // {
    //     $question = QuestionModel::find($request->id);
    //     if (!$question) {
    //         return redirect()->back()->with('error', 'Şube bulunamadı.');
    //     }
    //     $question->delete();
    //     return redirect()->back()->with('success', 'Şube başarıyla silindi!');
    // }
    public function add(Request $request)
    {
        $question = new QuestionModel();
        $question->question_text = $request->question_text;
        $question->choice_1 = $request->choice_1;
        $question->choice_2 = $request->choice_2;
        $question->choice_3 = $request->choice_3;
        $question->choice_4 = $request->choice_4;
        $question->correct_answer = $request->correct_answer;
        $question->save();

        $questionId = $question->id;
        // TestModel'e yeni kayıt ekle
        $test = new TestQuestionModel();
        $test->question_id = $questionId;
        $test->test_id = $request->test_id;
        $test->save();

        return redirect()->back()->with('success', 'Soru başarıyla eklendi.');
    }
}
