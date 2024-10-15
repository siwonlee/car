<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upc;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Upindi;
use Carbon\Carbon;  
use Auth;
use SebastianBergmann\Environment\Console;

class UpcController extends Controller
{

 



    public function __construct()
    {
        $this->middleware('auth');
    


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcs = Upc::all();
        return view('temp')->with($arr);
        //return $arr;

    }

    public function approved()
    {
        $upcs['upcs'] = Upc::where('verify', 1) ->orderby('verify_date','desc')->paginate(10) ;

        return view('temp')->with($upcs);
        //return $arr;

    }

    public function approved_cate($cate)
    {
        //$this->cate = $cate;
        $upcs['upcs'] = Upc::where('verify', 1) -> where('category', $cate)->orderby('verify_date','desc')->paginate(10) ;

        return view('temp')->with($upcs);
        //return $arr;

    }
    public function pending_cate(Request $request)
    {
        $cate = $request->input('cate');
        $upcs['upcs'] = Upc::where('verify', 2) -> where('category', $cate)->orderby('verify_date','desc')->paginate(10) ;
        return view('temp')->with($upcs);
     }

     public function denied_cate(Request $request)
     {
         $cate = $request->input('cate');
         $upcs['upcs'] = Upc::where('verify', 3) -> where('category', $cate)->orderby('verify_date','desc')->paginate(10) ;
         return view('temp')->with($upcs);
      }
 



    public function approved_sub($cate,$sub)
    {
        //$this->cate = $cate;
        $upcs['upcs'] = Upc::where('verify', 1) -> where('category', $cate)
        ->where('subcategory',$sub)
        ->orderby('verify_date','desc')->paginate(10) ;

        return view('temp')->with($upcs);
        //return $arr;

    }


   

    public function pending()
    {
        $cate = 1;
        $upcs['upcs'] = Upc::where('verify',2)->orderby('verify_date','desc')->paginate(10) ;
        return view('temp')->with($upcs)->with($cate);
        //return $arr;

    }

    public function denied()
    {
        $upcs['upcs'] = Upc::where('verify', 3)->orderby('verify_date','desc')->paginate(10) ;
        return view('temp')->with($upcs);
        //return $arr;

    }
    public function recent_edit()
    {
        $upcs['upcs'] = Upc::where('edit_date','!=' ,'')->orderby('timestamp','desc')->paginate(10) ;
        return view('temp')->with($upcs);
        //return $arr;

    }

    public function make_pending($id)
    {
        Upc::where('id', $id)
              ->update(['verify' => 2,'approved'=>'Pending']);

              return redirect()->back()->with('pending','The item has been pended for a future review.');

        //return $arr;

    }


    public function make_denied(Request $request, $id)
    {


        $comment = $request->input('comment');
        $time = $request->input('time');
        $staff = $request->input('staff');
        $upc = $request->input('upc');

        Upc::where('id', $id)
              ->update([
                 'verify' => 3,
                 'approved'=>'no',
                 'comment'=>$comment,
                 'verify_date'=>$time,
                 'verify_staff'=>$staff,
                 'edit_date'=>$time,
                 'edit_staff'=>$staff,
                 ]);

              return redirect()->back()->with('deny','The item( '.$upc.' ) has been denied.');

        //return $arr;

    }

  public function make_approved($id)
    {
        $time = Carbon::now()->format('Y-m-d');
        $staff = Auth::user()->name;
        $upc = Upc::find($id)->upc;
        Upc::where('id', $id)
              ->update([
                  'verify' => 1,
                  'approved'=>'Yes',
 
                  'verify_date'=>$time,
                  'verify_staff'=>$staff,
 
                  'edit_staff'=>$staff                
                  
                  
                  
                  
                  ]);

              return redirect()->back()->with('approved','The item( '.$upc.' ) has been approved.');;
 
        //return $arr;

    }


    public function edit(Request $request, $id)
    {
 

        $request->validate([
        
            'upc' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'short_desc' => 'required',
            'size' => 'required',
            'uom' => 'required',
            'high_cost' => 'required',
            'benefit_qt' => 'required',
            'benefit_uom' => 'required'
      



        ]);

        $time = $request->input('time');
        $staff = $request->input('staff');
        $verify = $request->input('verify');     
        $upc = $request->input('upc');          
        

        $image = $request->input('image');        
        $approved = $request->input('approved');
        $verify_staff = $request->input('verify_staff');
 
        $category = $request->input('category');
        $subcategory = $request->input('subcategory');
        $brand = $request->input('brand');
        $description = $request->input('description');
        $short_desc = $request->input('short_desc');
        $size = $request->input('size');
        $uom = $request->input('uom');
        $high_cost = $request->input('high_cost');
        $ingredients = $request->input('ingredients');
        $nutrition = $request->input('nutrition');
        $benefit_qt = $request->input('benefit_qt');
        
        $benefit_uom = $request->input('benefit_uom');
        $comment = $request->input('comment');
    
 


        Upc::where('id', $id)
              ->update([
 
                'verify' => $verify,
                 'edit_date'=>$time,
                 'edit_staff'=>$staff,
                 'image'=>  $image,       
                 'approved'=> $approved,
               'category'=>   $category,
            'subcategory'=>     $subcategory, 
               'brand'=>  $brand, 
              'description'=>    $description,
               'short_desc'=>   $short_desc,
               'size'=>   $size,
               'uom'=>   $uom,
               'high_cost'=>   $high_cost,
            'benefit_uom'=>    $benefit_uom,
            'benefit_qt' => $benefit_qt,
           'comment'=>       $comment,
 

                 
                 ]);

                 $result = Ingredient::where('upc', $upc)->first();
               



                 if($result){

                 Ingredient::where('upc', $upc)
                 ->update([
    
                   'ingredients' => $ingredients,
                    'nutrition'=>$nutrition,
                       
                    ]);

                 }else{

                    Ingredient::create([
                        'id' => $id,
                        'upc' => $upc,
                      'ingredients' => $ingredients,
                       'nutrition'=>$nutrition,
                          
                       ]);



                 }




              return redirect()->back()->with('approved','The item( '.$upc.' ) has been updated.');

        //return $arr;

    }



    public function edit_attach(Request $request, $id)
    {
 

$upc = Upc::find($id);
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



        $request->validate([

            'upc' => 'required',
 
  

        ]);

        $time = $request->input('time');
        $staff = $request->input('staff');
        $upc = $request->input('upc');
       
          
        
 
  
    
 


        Upc::where('id', $id)
              ->update([
 
                 
                 'edit_date'=>$time,
                 'edit_staff'=>$staff,
                 'pic'=>  $pic,       
                 'pic1'=> $pic1,
               'pic2'=>   $pic2,
    
                 
                 ]);

              return redirect()->back()->with('approved','The item( '.$upc.' ) has been updated.');

        //return $arr;

    }




    public function detail($id)
    {
        $upcs['upcs']= Upc::where('id', $id)->get();

     
   
              return view('detail')->with($upcs);

        //return $arr;

    }
    

    public function add_upc()
    {

        return view('add_upc');
 
    }
    
    public function subcategory($id){
        echo json_encode(Category::where('cate', $id)->get());
    }





    
    public function add_upc_post(Request $request)
    {
   

         $request->validate([
        
           'upc' => 'required',
           'category' => 'required',
           'subcategory' => 'required',
           'brand' => 'required',
           'description' => 'required',
           
           'size' => 'required',
           'uom' => 'required',
           'pic1' => 'required',
           'pic2' => 'required'

          ],
        [

 'pic1.required' => 'The ingredients field is required.',
 'pic2.required' => 'The nutrition field is required.',

        ]
        
        );




 

   if($request->hasFile('pic')){
       $pic = $request->pic->getClientOriginalName();
       $request->pic->storeAs('upload_img', $pic,'public');
}else{$pic='';}
   if($request->hasFile('pic1')){
       $pic1 = $request->pic1->getClientOriginalName();
       $request->pic1->storeAs('upload_img',$pic1, 'public');
    }else{$pic1='';}

   if($request->hasFile('pic2')){
   $pic2 = $request->pic2->getClientOriginalName();
    $request->pic2->storeAs('upload_img',$pic2, 'public');
}else{$pic2='';}       
  

 
        
        
       
        


        $time = $request->input('time');
        $staff = $request->input('staff');
   

        $upc = $request->input('upc');          
        $category = $request->input('category');
        $subcategory = $request->input('subcategory');  
        $brand = $request->input('brand');        
        $description = $request->input('description');        
        $size = $request->input('size');
        $uom = $request->input('uom');
        $corp = $request->input('corp');   
        $user_id = $request->input('user_id'); 

//dd($user_id);

  
        Upindi::create([
 
               'upc' => $upc,
               'category'=>   $category,
                'subcategory'=>     $subcategory,     
                'brand'=>  $brand, 
              'description'=>    $description,
               'size'=>   $size,
               'uom'=>   $uom,               
               'corp'=>   $corp,                   
               'user_id'=>   $user_id,                   
               'add_date'=>$time,
 
               
               'add_staff'=>$staff,
 
 
               'pic'=>  $pic,       
               'pic1'=> $pic1,
               'pic2'=> $pic2,

 
                  
                 ]);

              return redirect()->back()->with('approved','The item( '.$upc.' ) has been added.');

        //return $arr;

    }
    
 
    
    public   function  status(Request $request)
    {
        
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '' and  !(strlen($query)==12 or strlen($query)==13 or strlen($query)==8 ))
      {

        $output = "<div class='alert alert-danger'> The upc length should be 8, 12 or 13 including a check digit at the end.</div>";
        $disabled = "yes";

      }
      if($query != '' and  (strlen($query)==12 or strlen($query)==13 or strlen($query)==8 ))
      {
        if(strlen($query)==12){
            $upc_left2=substr($query,0,12);
            $b2 = str_split($upc_left2);
            $c2 = ($b2[0]+$b2[2]+$b2[4]+$b2[6]+$b2[8]+$b2[10])*3;
            $d2 = ($b2[1]+$b2[3]+$b2[5]+$b2[7]+$b2[9]);
            $e2 = $c2 + $d2;
            $f2 = $e2%10;
            $g2 = 10-$f2;
             if($g2==10){$g2=0;	}
            
             if($b2[11]==$g2){$cv = '1'; }else{$cv = '0';}
             
             }
             
            if(strlen($query)==13){
            $upc_left3=substr($query,0,13);
            $b3 = str_split($upc_left3);
            $c3 = ($b3[0]+$b3[2]+$b3[4]+$b3[6]+$b3[8]+$b3[10]);
            $d3 = ($b3[1]+$b3[3]+$b3[5]+$b3[7]+$b3[9]+$b3[11])*3;
            $e3 = $c3 + $d3;
            $f3 = $e3%10;
            $g3 = 10-$f3;
             if($g3==10){$g3=0;	 }
             
             if($b3[12]==$g3){$cv = '1'; }else{$cv = '0';}
             


             
             }

      
 
 
       $data = Upc::where('upc', 'like', $query)->get(); 
       $data_indi = Upindi::where('upc', 'like', $query)->get(); 

      //dd($data_indi);


       if(count($data)  ){

          foreach($data as $d){

            $verify = $d->verify;
            $upc = $d->upc;
            $description = $d->description;
            $category = $d->category;
            $subcategory = $d->subcategory;
            $size = $d->size;
            $uom = $d->uom;



             }
      if($cv == '1'     and $verify == 1){$output = "<div class='alert alert-danger'> The upc (".$upc.") is alrealy in the APL.<br>Approved : ".$description." / ".$category."-".$subcategory." / ".$size." / ".$uom."<br>No need to add it.</div>"; }
      if($cv == '1'    and $verify == 2){$output = "<div class='alert alert-danger'> The upc (".$upc.") is alrealy in the APL.<br>Pending : ".$description." / ".$category."-".$subcategory." / ".$size." / ".$uom."<br>No need to add it.</div>"; }
      if($cv == '1'    and $verify == 3){$output = "<div class='alert alert-danger'> The upc (".$upc.") is alrealy in the APL.<br>Denied : ".$description." / ".$category."-".$subcategory." / ".$size." / ".$uom."<br>No need to add it.</div>"; }    
 
      $disabled = "yes";    

       } else if (count($data_indi)){

        foreach($data_indi as $f){

            $verify_indi = $f->verify;
           // $approved_inidi = $f->approved;
            $upc_indi = $f->upc;
            $description_indi = $f->description;
            $category_indi = $d->category;
            $subcategory_indi = $d->subcategory;
            $size_indi = $d->size;
            $uom_indi = $d->uom;


           // $add_date_indi = $f->add_date;
             }

             if($cv == '1'     and $verify_indi == 1){$output = "<div class='alert alert-danger'> The upc (".$upc_indi.") has been already collected.<br>Approved : ".$description_indi." / ".$category_indi."-".$subcategory_indi." / ".$size_indi." / ".$uom_indi."<br>No need to add it.</div>"; }
             if($cv == '1'    and $verify_indi == 2){$output = "<div class='alert alert-danger'> The upc (".$upc_indi.") has been already collected.<br>Pending : ".$description_indi." / ".$category_indi."-".$subcategory_indi." / ".$size_indi." / ".$uom_indi."<br>No need to add it.</div>"; }
             if($cv == '1'    and $verify_indi == 3){$output = "<div class='alert alert-danger'> The upc (".$upc_indi.") has been already collected.<br>Denied : ".$description_indi." / ".$category_indi."-".$subcategory_indi." / ".$size_indi." / ".$uom_indi."<br>No need to add it.</div>"; }  
             if($cv == '1'    and $verify_indi == ''){$output = "<div class='alert alert-danger'> The upc (".$upc_indi.") has been already collected and under review.<br>".$description_indi." / ".$category_indi."-".$subcategory_indi." / ".$size_indi." / ".$uom_indi."<br>No need to add it.</div>"; }  

             $disabled = "yes"; 


       }else if($cv == '1' )  { $output = "<div class='alert alert-success'> Please add it.</div>";      $disabled = "no";   } else    
    if($cv == '0'){ $output = "<div class='alert alert-danger'> It has a wrong check digit.</div>";      $disabled = "yes"; } else {

        $output = "<div class='alert alert-danger'> The upc length should be 8, 12 or 13 including a check digit at the end.</div>";
        $disabled = "yes";


      }



 
   }

   }
     

   
      return $data = array(
       'table_data'  => $output,
       'disabled' => $disabled,
   
        );

     // echo json_encode($data);
     }
 
 


   
    public function add_upc_upload(Request $request){


       $request->image->store('upload_img', 'public');
  echo "done";

  


    }
    

 
 

  

}
