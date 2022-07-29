<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //
    public function home(){
        return view('main.welcome');
    }

    public function new_blog(){
        return view("main.new");
    }


    public function blog(){
        $data = BlogModel::orderBy('created_at','desc')->paginate(10);
        return view('main.blog', ['data'=>$data]);
    }

    

    public function blog_view( $id ){
        $data = BlogModel::where('id','=', $id)->first();       

        // $data = BlogModel::where('id', '=', $id )->first();
        return view('blog-view',['data'=>$data]);
    }

    public function new_blog_post( Request $request ){

        $validator = Validator::make( $request->all(), [
            'title'=>'required',
            'description'=>'required'
        ]);

        // dd($request->all());


        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator, 'msg'=>"validator error"]);
        }

        $img_path = array();

        $allowedextension = array('jpg','jpeg','png','gif');

        if( $request->total_files >=1 ){
           for( $i = 0; $i < $request->total_files; $i++){
            if( $request->hasFile('files'. $i) ){
                $file = $request->file('files'. $i);

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                if(in_array($extension, $allowedextension)){

                   
                    $uniq = uniqid() . "_" . md5($filename) . "." . $extension;

                    if($file->move('blog_img', $uniq))
                    {
                        array_push( $img_path, "blog_img/".$uniq);
                    }
                }else{
                    return response()->json(['status'=>false,'msg'=>'('.$filename.') Unsupported file type.']);
                }
            }
           }
        }
          $blog = new BlogModel();



           $serialize = serialize( $img_path );


           $blog->title = $request->title;
           $blog->description = $request->description;
           $blog->img = count($img_path)>0 ? $serialize : null; 
           $blog->type = strlen($request->type) > 0 ? $request->type : null;
           $blog->link = strlen($request->link) > 0 ? $request->link : null;
           $blog->rp_version = strlen($request->rp_version) > 0 ? $request->rp_version : null;
           $blog->status = 'beta';
           $blog->min_engine_version = strlen($request->min_engine_version)> 0 ? $request->min_engine_version : null;

           $blog->user_id = Auth::user()->id;
           
           if($blog->save()){

            return response()->json(['status'=>true,'errors'=>null,'msg'=>'Successfully.']);

           }else{
            return response()->json(['status'=>false, 'errors'=>null, 'msg'=>'Unsuccessfully.']);
           }

    }   
}
