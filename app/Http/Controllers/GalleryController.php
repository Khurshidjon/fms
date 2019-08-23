<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Uploader\FancyFileUploaderHelper;
use App\Album;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('web_backend.gallery.index', [
            'galleries' => $galleries,
            'is_active' => 'gallery',
        ]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::where('status', 1)->get();
        return view('web_backend.gallery.create', [
            'albums' => $albums,
            'is_active' => 'gallery',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($_REQUEST["action"]) && $_REQUEST["action"] === "fileuploader")
        {
            header("Content-Type: application/json");

            $allowedexts = array(
                "jpg" => true,
                "jpeg" => true,
                "png" => true,
            );

            $files = FancyFileUploaderHelper::NormalizeFiles("files");
            if (!isset($files[0]))  $result = array("success" => false, "error" => "File data was submitted but is missing.", "errorcode" => "bad_input");
            else if (!$files[0]["success"])  $result = $files[0];
            else if (!isset($allowedexts[strtolower($files[0]["ext"])]))
            {
                $result = array(
                    "success" => false,
                    "error" => "Invalid file extension.  Must be '.jpg' or '.png'.",
                    "errorcode" => "invalid_file_ext"
                );
            }
            else
            {
                // For chunked file uploads, get the current filename and starting position from the incoming headers.
                $name = FancyFileUploaderHelper::GetChunkFilename();

                if ($name !== false)
                {
                    $startpos = FancyFileUploaderHelper::GetFileStartPosition();
                }
                else
                {
                    if (isset($_REQUEST['album_id'])){
                        $album_id = $_REQUEST['album_id'];
                        $gallery = new Gallery();

                        $img_name = explode('.', $files[0]['name']);
                        $img_name = $img_name[0];
                        $filename = $request->file('files')->store('Gallery'.'/'. date('FY'), 'public');
                        $gallery->filename = $filename;
                        $gallery->album_id = $album_id;
                        $gallery->title = $img_name;
                        $gallery->save();
                    }
                }

                $result = array(
                    "success" => true
                );
            }
            echo json_encode($result, JSON_UNESCAPED_SLASHES);
            exit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
