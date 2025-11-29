<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private function _validate(Request $request, bool $full = false): array
    {
        $required = $full ? '|required' : '';
        return $request->validate([
            'title' => 'string' . $required,
            'description' => 'nullable|string',
            'status' => 'string|in:planned,in_progress,done' . $required,
            'date_finished' => 'nullable|string',
            'assignee_user_id' => 'nullable|integer|exists:users,id',
        ]);
    }

    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        if (!$request->has("status")) {
            $request->merge([
                "status" => "planned",
            ]);
        }

        $validated = $this->_validate($request, true);
        $task = Task::create($validated);

        return response()->json($task);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $this->_validate($request);
        $task->update($validated);
        if ($request->has('attachment')) {
            $media = null;
            if (strlen($request->get('attachment'))) {
                $media = $task->addMediaFromBase64($request->get('attachment'));
            }
            $task->clearMediaCollection("attachment");
            if (isset($media)) {
                $media->toMediaCollection('attachment');
            }
        }

        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        if ($task->hasMedia("attachment")) {
            $mediaItems = $task->getMedia("attachment");
            foreach ($mediaItems as $media) {
                $media->delete();
            }
        }
        $task->delete();
        return response()->json(['message' => 'Task deleted'], 204);
    }
}
