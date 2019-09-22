<?php

namespace App\Observers;

use App\Models\Movie;
use Illuminate\Support\Facades\Log;
use Qiniu\Auth;

class MovieObserver
{
    /**
     * Handle the movie "created" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function created(Movie $movie)
    {
        // 如果影片数量超出5个，则删除最早的文件
        if (Movie::count() > 5) {
            $expiredMovie = Movie::first();
            $qiniuAuth = new Auth(
                config('filesystems.disks.qiniu.access_key'),
                config('filesystems.disks.qiniu.secret_key')
            );
            $bucket = config('filesystems.disks.qiniu.bucket');
            $config = new \Qiniu\Config();
            $bucketManager = new \Qiniu\Storage\BucketManager($qiniuAuth, $config);
            $imageErr = $bucketManager->delete($bucket, str_replace(
                '//' . config('filesystems.disks.qiniu.domain') . '/',
                '',
                $expiredMovie->cover
            ));
            if ($imageErr !== null) {
                Log::error('删除' . $expiredMovie->name . '图片失败' . $imageErr->message());
            }
            $videoErr = $bucketManager->delete($bucket, str_replace(
                '//' . config('filesystems.disks.qiniu.domain') . '/',
                '',
                $expiredMovie->video
            ));
            if ($videoErr !== null) {
                Log::error('删除' . $expiredMovie->name . '视频失败' . $videoErr->message());
            }
            $expiredMovie->delete();
        }
    }

    /**
     * Handle the movie "updated" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function updated(Movie $movie)
    {
        //
    }

    /**
     * Handle the movie "deleted" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function deleted(Movie $movie)
    {
        //
    }

    /**
     * Handle the movie "restored" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function restored(Movie $movie)
    {
        //
    }

    /**
     * Handle the movie "force deleted" event.
     *
     * @param  \App\Models\Movie  $movie
     * @return void
     */
    public function forceDeleted(Movie $movie)
    {
        //
    }
}
