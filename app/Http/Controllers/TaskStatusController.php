<?php

namespace App\Http\Controllers;

use App\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskStatuses = TaskStatus::paginate();

        return view('taskStatus.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
        return view('taskStatus.create', compact('taskStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taskstatus = new TaskStatus();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $taskstatus->fill($request->all());
        $taskstatus->save();

        flash(__('taskStatuses.created'))->success();
        return redirect()
            ->route('taskstatuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskStatus $taskstatus)
    {
        return view('taskStatus.edit', compact('taskstatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskStatus $taskstatus)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $taskstatus->fill($request->all());
        $taskstatus->save();

        flash(__('taskStatuses.updated'))->success();
        return redirect()
            ->route('taskstatuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskStatus $taskstatus)
    {
        if ($taskstatus) {
            $taskstatus->delete();
        }

        flash(__('taskStatuses.deleted'))->success();
        return redirect()
            ->route('taskstatuses.index');
    }
}
