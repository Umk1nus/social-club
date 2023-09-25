<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('user_id', auth()->id())->latest()->get();
        return PostResource::collection($posts);
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        $data['user_id'] = auth()->id();
        if ($request['image']) {
            $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request['image']));
            $tmpFilePath = sys_get_temp_dir(). '\\' . Str::uuid()->toString();
            file_put_contents($tmpFilePath, $fileData);
            $tmpFile = new File($tmpFilePath);
    
            $file = new UploadedFile(
                $tmpFile->getPathname(),
                $tmpFile->getFilename(),
                $tmpFile->getMimeType(),
                0,
                true
            );
    
            $path = Storage::disk('public')->put('/image', $file);
            $data['image'] = url('storage/' . $path);
        }

        Post::create($data);

        return $data;
    }

    public function follow() {
        $followedIds = auth()->user()->follow()->get()->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $followedIds)->get();

        return PostResource::collection($posts);
    }
}
