<?php

namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use App\Models\Upc;
use App\Models\Category;

use App\Models\Upindi;
 
use Auth;


class UploadController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $user_id = Auth::user()->id;

        $upcs['upcs'] = Upindi::where('user_id',$user_id)->orderby('timestamp','desc')->paginate(10) ;
       
        return view('mywork')->with($upcs) ;

    }
   
    
 
  
    public function delete($id)
    {
 
        $staff = Auth::user()->name;
        $upc = Upindi::find($id)->upc;
        Upindi::where('id', $id)->delete();

              return redirect()->back()->with('approved','The item( '.$upc.' ) has been removed.');
 
        //return $arr;

    }


    public function apl_check_m()
    {
 
  Return view('apl_check_m');

    }


 
     


    public function apl_check_m_output(Request $request)
    {

        if($request){

            function explodeX( $delimiters, $string )
            {
                return explode( chr( 1 ), str_replace( $delimiters, chr( 1 ), $string ) );
            }


       $sentupcs = $request->input('upc');
      $sentupcs = explodeX(array(",",".","|",":","\r\n", " ","\n", "\r"), $sentupcs);
     // dd($sentupcs);
        //$upcs = Upc::search($sentupcs)->get();
        $upcs = Upc::whereIn('upc',$sentupcs)->get();
 // dd($upcs);
            $inupcs = [];      
        foreach($upcs as $c){

array_push($inupcs,$c->upc);

 

        }


       }

        //dd($upcs);
        //dd($inupcs);

return view('apl_check_m_output', compact('upcs','sentupcs','inupcs'));
 
    
    //       return redirect()->back()->with('approved','The item( '.$upc.' ) has been removed.');;
 

    }


 
     
    public function edit(Request $request, $id)
    {
 
    

        $time = $request->input('time');
        $upc = $request->input('upc');          
        $category = $request->input('category');
        $subcategory = $request->input('subcategory');
        $brand = $request->input('brand');
        $description = $request->input('description');
        $size = $request->input('size');
        $uom = $request->input('uom');
        $comment = $request->input('comment');
        $staff = $request->input('staff');
    
 
        Upindi::where('id', $id)
              ->update([
 
  
               'upc'=>   $upc,
               'category'=>   $category,
            'subcategory'=>     $subcategory, 
               'brand'=>  $brand, 
              'description'=>    $description,
    
               'size'=>   $size,
               'uom'=>   $uom,
 
           'comment'=>       $comment,
           'edit_staff'=>       $staff,
 

                 
                 ]);

  
              return redirect()->back()->with('approved','The item( '.$upc.' ) has been updated.');

        //return $arr;

    }


     
    public function edit_attach(Request $request, $id)
    {
 

$upc = Upindi::find($id);
$pic = $upc->pic;
$pic1 = $upc->pic1;
$pic2 = $upc->pic2;

        
   if($request->hasFile('pic')){
    $pic = $request->pic->getClientOriginalName();
    $request->pic->storeAs('upload_img', $pic,'public');
} 

if($request->hasFile('pic1')){
    $pic1 = $request->pic1->getClientOriginalName();
    $request->pic1->storeAs('upload_img',$pic1, 'public');
 } 

if($request->hasFile('pic2')){
$pic2 = $request->pic2->getClientOriginalName();
 $request->pic2->storeAs('upload_img',$pic2, 'public');
}    

$time = $request->input('time');
$staff = $request->input('staff');          
 
 
 


        Upindi::where('id', $id)
              ->update([
 
                 
                 'add_date'=>$time,
                 'add_staff'=>$staff,
                 'pic'=>  $pic,       
                 'pic1'=> $pic1,
               'pic2'=>   $pic2,
    
                 
                 ]);

              return redirect()->back()->with('approved','The item( '.$upc->upc.' ) has been updated.');

        //return $arr;

    }



  
      







}
