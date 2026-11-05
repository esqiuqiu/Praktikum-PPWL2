<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    public function created(Post $post): void
    {
        logger('Post berhasil dibuat: ' . $post->title);
    }

    public function updated(Post $post): void
    {
        logger('Post berhasil diperbarui: ' . $post->title);
    }

    public function deleted(Post $post): void
    {
        logger('Post berhasil dihapus: ' . $post->title);
    }
}