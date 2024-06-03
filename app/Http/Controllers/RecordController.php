<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Carbon\Carbon;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::where('user_id', auth()->id())->get();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'required|string',
            'timezone' => 'required|string'
        ]);

        $task_time = Carbon::now($request->timezone);

        Record::create([
            'user_id' => auth()->id(),
            'task_name' => $request->task_name,
            'task_description' => $request->task_description,
            'task_time' => $task_time
        ]);

        return redirect()->route('records.index');
    }
}
