<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Task extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'status',
        'date_finished',
        'assignee_user_id',
    ];

    protected $appends = [
        "attachment",
    ];

    public function getAttachmentAttribute(): ?string
    {
        if (!$this->hasMedia("attachment")) {
            return null;
        }

        $media = $this->getFirstMedia("attachment");
        return ($_SERVER["REQUEST_SCHEME"] ?? "http") . "://" . $_SERVER["HTTP_HOST"] . "/download/attachments/tasks/{$media->model_id}/{$media->id}";
    }
}
