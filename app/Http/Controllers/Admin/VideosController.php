<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Videos\VideoRequest;
use App\Models\Video;
use App\Models\Section;
use App\Jobs\CreateForStreaming;
use App\Jobs\ConvertVideoThumbnailJob;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;

class VideosController extends Controller
{
    public function index(Section $section){
        //Authorization
        $permissions=auth()->user()->getAllPermissions()->pluck('name')->toArray();
        if(in_array('view_all_videos',$permissions) || auth()->user()->id == $section->user_id){
            //fetching Videos
            $videos = $section->videos();
            $search=request()->search;
            if(!is_null($search)){
                $videos=$videos->where('title','Like',"%$search%");
            }
            $videos=$videos->get();
            $course = $section->course;
            return view('admin.courses.sections.videos.index', compact('section', 'videos','course'));
        }
        else{
            abort(401);
        }

    }

    public function create(Section $section){
        //Authorization
        if($section->user_id !== auth()->user()->id){
            abort(401);
        }

        //displaying create form
        $course=$section->course;
        return view('admin.courses.sections.videos.create',compact('section','course'));
    }

    public function store(VideoRequest $request,Section $section){
        //authorization
        if($section->user_id !== auth()->user()->id){
            abort(401);
        }

        //Store Video
        $length=Video::count();
        $course=$section->course;
        $video=$section->videos()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'order'=>$length+1,
            'user_id'=>auth()->user()->id
        ]);
        return view('admin.courses.sections.videos.upload',compact('video','course','section'));
    }

    public function edit(Section $section,Video $video){
        //Authorization
        $this->authorize('update',$video);

        //Shoe Edit Form
        $course=$section->course;
        return view('admin.courses.sections.videos.edit',compact('video','course','section'));
    }

    public function update(Section $section,Video $video,VideoRequest $request){
        //Authorization
        $this->authorize('update',$video);

        //Update Video
        $video->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect()->back()->with('succeess','Success - Video Updated');
    }

    public function destroy(Section $section,Video $video){
        //Authorization
        $this->authorize('destroy',$video);

        //Delete Streamable Video
        Storage::disk('public')->deleteDirectory('videos/'.$video->id);

        //Delete Original Video File
        Storage::disk('public')->delete($video->video);

        //Delete Video Thumbnail
        Storage::disk('public')->delete($video->thumbnail_path);

        //Delete Data in Database
        $video->delete();
        return redirect()->back()->with('success','Success - Video Deleted');


    }

    //video Upload
    public function videoUpload(Request $request, FileReceiver $receiver,$id)
    {
        //Authorization
        $video=Video::findOrFail($id);
        if(auth()->user()->id !== $video->user_id){
            abort(401);
        }

        //Uploading
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need
            return $this->saveFile($save->getFile(),$id);
        }

        $handler = $save->handler();
        // CreateForStreaming::dispatch();

        // $video=Video::findOrFail($id);
        return response()->json([
            "done" => $handler->getPercentageDone(),
            "status" => true,

        ]);
    }

    protected function saveFile(UploadedFile $file,$id)
    {
        $fileName = $this->createFilename($file);

        // Group files by the date
        $yearFolder = date('Y');
        $monthFolder = date('m');
        $filePath = "upload/{$yearFolder}/{$monthFolder}/";
        $finalPath = storage_path("app/public/{$filePath}");

        // move the file name
        $file->move($finalPath, $fileName);
        $video=Video::findOrFail($id);
        $video->video= $filePath.'/'.$fileName;
        $video->update();

        ConvertVideoThumbnailJob::dispatch($video);
        CreateForStreaming::dispatch($video);
        return [
            'path' => Storage::url($filePath . $fileName),
            'video' => $video
        ];
    }

    protected function createFilename(UploadedFile $file)
    {
        return implode([
            time(),
            mt_rand(100, 999),
            '.',
            $file->getClientOriginalExtension()
        ]);
    }
    public function show_video($id){
        $video=Video::findOrFail($id);
        return response()->json($video);
    }

    public function order(Section $section,Video $video,Request $request){

        // $posts = Post::where('title', 'omnis')->get();

        $videos=$section->videos;

        foreach ($videos as $video) {

            foreach ($request->order as $order) {
                // return response()->json($order);
                if ($order['id'] == $video->id) {
                    $video->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }

}
