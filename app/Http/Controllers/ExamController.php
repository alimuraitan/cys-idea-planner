<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    // دالة تخزين الاختبارات في قاعدة البيانات
    public function store(Request $request)
    {
        $exam = new Exam();
        $exam->subject = $request->examSubject;
        $exam->date = $request->examDate;
        $exam->time = $request->examTime;
        $exam->save();  // تخزين الاختبار في قاعدة البيانات

        return redirect('/exams')->with('success', 'تمت إضافة الاختبار بنجاح!');
    }

    public function index()
    {
        $exams = Exam::all(); // جلب جميع الاختبارات من جدول exams
        return view('exam_schedule', compact('exams'));
    }

}
