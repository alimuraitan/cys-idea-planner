<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    // دالة تخزين المحاضرات في قاعدة البيانات
    public function store(Request $request)
    {
        $lecture = new Lecture();
        $lecture->subject = $request->subjectName;
        $lecture->startTime = $request->startTime;
        $lecture->endTime = $request->endTime;
        $lecture->day = $request->dayOfWeek;
        $lecture->save();  // تخزين المحاضرة في قاعدة البيانات

        return redirect('/lectures')->with('success', 'تمت إضافة المحاضرة بنجاح!');
    }

    public function index()
    {
        $lectures = Lecture::all();
        return view('lectures_schedule', compact('lectures'));
    }

}