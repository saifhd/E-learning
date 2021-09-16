<?php

namespace App\Jobs;

use App\Models\Video;
use Carbon\CarbonInterval;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ConvertVideoThumbnailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $video;
    public function __construct(Video $video)
    {
        $this->video=$video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        FFMpeg::fromDisk('public')
            ->open($this->video->video)
            ->getFrameFromSeconds(1)
            ->export('public')
            ->save('thumbnails/' . $this->video->id . '.png');


        $durationInSeconds = FFMpeg::fromDisk('public')
            ->open($this->video->video)->getDurationInSeconds();
        // $seconds=CarbonInterval::seconds($durationInSeconds)->cascade()->s;
        // $minutes= CarbonInterval::seconds($durationInSeconds)->cascade()->i;
        // $hours=CarbonInterval::seconds($durationInSeconds)->cascade()->h;

        $this->video->thumbnail_path = 'thumbnails/' . $this->video->id . '.png';
        // $this->video->duration=$hours.' : '.$minutes.' : '.$seconds;
        $this->video->duration= $durationInSeconds;
        $this->video->update();

    }
}
