<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PhotoController extends Controller
{
    public function index(){
      return view('home');
    }

    public function insert(Request $request){
      $url= $request->get("url");
      $photo = DB::table('favaritephoto')->get();
      $count = 0;
      foreach ($photo as $pho) {
        if(($pho->img_url)==$url){
          $count = $count+1;
        }
      }
      if($count==0){
        DB::insert('insert into favaritephoto (img_url) values(?)',[$url]);
      }

   }

   public function favarite(){
     $photo = DB::table('favaritephoto')->distinct('img_url')->get();

     return view('favarite', ['photo' => $photo]);
  }

  public function insertDes(Request $request){
    $url= $request->get("url");
    $des= $request->get("des");
    DB::update('update favaritephoto set discription = ? where img_url = ?',[$des,$url]);
    $photo = DB::table('favaritephoto')->distinct('img_url')->get();
    // return view('favarite', ['photo' => $photo]);
    return back();


 }

 public function delete(Request $request){
   $url= $request->get("url");
   DB::delete('delete from favaritephoto where img_url = ?',[$url]);
   $photo = DB::table('favaritephoto')->distinct('img_url')->get();
   // return view('favarite', ['photo' => $photo]);
   return back();

}

}
