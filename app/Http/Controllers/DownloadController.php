<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download(Request $request, int $modelId, int $mediaId)
    {
        $model = Task::findOrFail($modelId);

        $mediaItem = $model->getMedia("attachment")->where('id', $mediaId)->first();

        if (!$mediaItem) {
            abort(404, 'Media item not found.');
        }

        return $mediaItem->toResponse($request);
    }
}
