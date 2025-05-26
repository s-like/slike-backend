<?php

namespace App\Jobs;

use FFMpeg as FFMpeg;
use Illuminate\Http\File;
use FFMpeg\Format\Video\X264;
use FFMpeg\Format\Video\X265;
use Illuminate\Bus\Queueable;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ExtractAudioJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $vidoeFilePath, $user_id, $video_id, $time_folder, $storageDrive, $audioStorePath, $s3AudioFolder, $s3AudioFileName;
    /**
     * Create a new job instance.
     */
    public function __construct($vidoeFilePath, $user_id = 0, $video_id = 0, $time_folder = '', $storageDrive = "local", $audioStorePath = '', $s3AudioFolder = '', $s3AudioFileName = '')
    {
        $this->vidoeFilePath = $vidoeFilePath;
        $this->user_id = $user_id;
        $this->video_id = $video_id;
        $this->time_folder = $time_folder;
        $this->storageDrive = $storageDrive;
        $this->audioStorePath = $audioStorePath;
        $this->s3AudioFolder = $s3AudioFolder;
        $this->s3AudioFileName = $s3AudioFileName;

    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $vidoeFilePath=$this->vidoeFilePath;
        $user_id=isset($this->user_id) ? $this->user_id : 0;
        $video_id=isset($this->video_id) ? $this->video_id : 0;
        $time_folder=$this->time_folder;
        $storageDrive=$this->storageDrive;
        $audioStorePath=$this->audioStorePath;
        $s3AudioFolder=$this->s3AudioFolder;
        $s3AudioFileName=$this->s3AudioFileName;

        $ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries'  => config('app.ffmpeg'),
            'ffprobe.binaries' => config('app.ffprobe'),
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12, // The number of threads that FFMpeg should use
        ));
        $ffprobe =  FFMpeg\FFProbe::create(array(
            'ffmpeg.binaries'  => config('app.ffmpeg'),
            'ffprobe.binaries' => config('app.ffprobe'),
            'timeout'          => 3600, // The timeout for the underlying process
            'ffmpeg.threads'   => 12, // The number of threads that FFMpeg should use
        ));
        // $streamCount = $this->ffprobe->streams($this->vidoeFilePath)->audios()->count();
        // if ($streamCount > 0) {
            \Log::info('ExtractAudio');
            \Log::info($vidoeFilePath);
            \Log::info($user_id);
            $audio = $ffmpeg->open($vidoeFilePath);
            $audio_format = new FFMpeg\Format\Audio\Mp3();
            $audio->save($audio_format, $audioStorePath);

            $duration = $ffprobe
                ->streams(storage_path('app/public/sounds/' . $user_id . '/' . $time_folder . '.mp3'))
                ->audios()
                ->first()
                ->get('duration');
            // dd($duration);
            $audio_duration = round($duration);

            $track = new GetId3(new File(storage_path('app/public/sounds/' . $user_id . '/' . $time_folder . '.mp3')));

            $title = $track->getTitle();
            $album = $track->getAlbum();
            $artist = $track->getArtist();
            // if ($this->storageDrive == 's3') {
            //     unlink(storage_path('app/public/sounds/' . $this->user_id . '/' . $this->time_folder . '.mp3'));
            // }


            $audioData = array(
                'user_id' => $user_id,
                'cat_id' => 0,
                'title'     => ($title != null) ? $title : "",
                'album'     => ($album != null) ? $album : "",
                'artist'    => ($artist != null) ? $artist : "",
                'sound_name' => $this->time_folder . '.mp3',
                // 'tags'     => $hashtags,
                'duration' => $audio_duration,
                'used_times' => 1,
                'created_at' => date('Y-m-d H:i:s')
            );

            $sound_id = DB::table('sounds')->insertGetId($audioData);
            DB::table('videos')->where('video_id', $video_id)->update(['sound_id' => $sound_id]);

            if ($this->storageDrive == 's3') {
                $file = new File($audioStorePath);
                Storage::putFileAs($s3AudioFolder, $file, $s3AudioFileName);
                Storage::setVisibility($s3AudioFolder . '/' . $s3AudioFileName, 'public');

                // unlink(storage_path('app/public/sounds/' . $this->user_id . '/' . $this->time_folder . '.mp3'));
            }
        // }
    }
}
