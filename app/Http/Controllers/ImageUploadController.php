<?php

namespace App\Http\Controllers;

use App\UploadImage;
use Illuminate\Http\Request;
use Validator;


class ImageUploadController extends Controller
{
    //
    /**
     * Show the application ajaxImageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
//        return "hi";
        return view('upload.uploadimage');
    }

    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $result="error";
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {
            $input = $request->all();
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $input['image']);
            UploadImage::create($input);
            $result="Your Image has been uploaded successfully";
            return $result;
        }
        return $result;
    }
}
