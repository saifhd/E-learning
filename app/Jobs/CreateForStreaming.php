<?php

namespace App\Jobs;

use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class CreateForStreaming implements ShouldQueue
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


        $lowBitrate = (new X264('aac'))->setKiloBitrate(250);
        $midBitrate = (new X264('aac'))->setKiloBitrate(500);
        $highBitrate = (new X264('aac'))->setKiloBitrate(1000);
        $f = FFMpeg::fromDisk('public')
        ->open($this->video->video)
        ->exportForHLS()
        ->onProgress(function($percentage){
            $this->video->percentage= $percentage;
            $this->video->update();
            // echo $percentage;

        })
        ->addFormat($lowBitrate,function($media) {
            $media->addFilter('scale=640:480');
        })
        ->addFormat($midBitrate,function($media) {

            $media->resize(960, 720);
        })
        ->addFormat($highBitrate,function ($media) {
            $media->addFilter(function ($filters, $in, $out) {

                $filters->custom($in, 'scale=1920:1200', $out); // $in, $parameters, $out
            });
        })
        ->toDisk('public')
        ->save('videos/' . $this->video->id . '/' . $this->video->id . '.m3u8');

        $path= 'videos/' . $this->video->id . '/' . $this->video->id . '.m3u8';
        $this->video->update([
            'streaming_path'=>$path
        ]);
    }
}
