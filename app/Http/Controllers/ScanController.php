<?php

namespace App\Http\Controllers;

use App\Models\CategoryAll;
use App\Models\Vendor;
use App\Models\VendorLog;
use Illuminate\Http\Request;

use App\Models\Upc;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Upindi;
use Carbon\Carbon;
use Auth;
use SebastianBergmann\Environment\Console;




class ScanController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function mywork(Request $request)
  {
    $user_id = Auth::user()->id;

    $upcs['upcs'] = Upindi::where('user_id', $user_id)->orderby('timestamp', 'desc')->paginate(10);

    return view('mywork')->with($upcs);
  }

  public function denied_cate(Request $request)
  {
    $cate = $request->input('cate');
    $upcs['upcs'] = Upc::where('verify', 3)->where('category', $cate)->orderby('verify_date', 'desc')->paginate(10);
    return view('temp')->with($upcs);
  }




  public function approved_sub($cate, $sub)
  {
    //$this->cate = $cate;
    $upcs['upcs'] = Upc::where('verify', 1)->where('category', $cate)
      ->where('subcategory', $sub)
      ->orderby('verify_date', 'desc')->paginate(10);

    return view('temp')->with($upcs);
    //return $arr;

  }




  public function pending()
  {
    $cate = 1;
    $upcs['upcs'] = Upc::where('verify', 2)->orderby('verify_date', 'desc')->paginate(10);
    return view('temp')->with($upcs)->with($cate);
    //return $arr;

  }

  public function denied()
  {
    $upcs['upcs'] = Upc::where('verify', 3)->orderby('verify_date', 'desc')->paginate(10);
    return view('temp')->with($upcs);
    //return $arr;

  }
  public function recent_edit()
  {
    $upcs['upcs'] = Upc::where('edit_date', '!=', '')->orderby('timestamp', 'desc')->paginate(10);
    return view('temp')->with($upcs);
    //return $arr;

  }

  public function make_pending($id)
  {
    Upc::where('id', $id)
      ->update(['verify' => 2, 'approved' => 'Pending']);

    return redirect()->back()->with('pending', 'The item has been pended for a future review.');

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
        'approved' => 'no',
        'comment' => $comment,
        'verify_date' => $time,
        'verify_staff' => $staff,
        'edit_date' => $time,
        'edit_staff' => $staff,
      ]);

    return redirect()->back()->with('deny', 'The item( ' . $upc . ' ) has been denied.');

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
        'approved' => 'Yes',

        'verify_date' => $time,
        'verify_staff' => $staff,

        'edit_staff' => $staff




      ]);

    return redirect()->back()->with('approved', 'The item( ' . $upc . ' ) has been approved.');;

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
      'benefit_uom' => 'required',
      'upc' => 'required',



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
        'edit_date' => $time,
        'edit_staff' => $staff,
        'image' =>  $image,
        'approved' => $approved,
        'category' =>   $category,
        'subcategory' =>     $subcategory,
        'brand' =>  $brand,
        'description' =>    $description,
        'short_desc' =>   $short_desc,
        'size' =>   $size,
        'uom' =>   $uom,
        'high_cost' =>   $high_cost,
        'benefit_uom' =>    $benefit_uom,
        'benefit_qt' => $benefit_qt,
        'comment' =>       $comment,



      ]);

    $result = Ingredient::where('upc', $upc)->first();




    if ($result) {

      Ingredient::where('upc', $upc)
        ->update([

          'ingredients' => $ingredients,
          'nutrition' => $nutrition,

        ]);
    } else {

      Ingredient::create([
        'id' => $id,
        'upc' => $upc,
        'ingredients' => $ingredients,
        'nutrition' => $nutrition,

      ]);
    }




    return redirect()->back()->with('approved', 'The item( ' . $upc . ' ) has been updated.');

    //return $arr;

  }



  public function edit_attach(Request $request, $id)
  {


    $upc = Upc::find($id);
    $pic = $upc->pic;
    $pic1 = $upc->pic1;
    $pic2 = $upc->pic2;


    if ($request->hasFile('pic')) {
      $pic = $request->pic->getClientOriginalName();
      $request->pic->storeAs('upload_img', $pic, 'public');
    }

    if ($request->hasFile('pic1')) {
      $pic1 = $request->pic1->getClientOriginalName();
      $request->pic1->storeAs('upload_img', $pic1, 'public');
    }

    if ($request->hasFile('pic2')) {
      $pic2 = $request->pic2->getClientOriginalName();
      $request->pic2->storeAs('upload_img', $pic2, 'public');
    }



    $request->validate([

      'upc' => 'required',



    ]);

    $time = $request->input('time');
    $staff = $request->input('staff');
    $upc = $request->input('upc');









    Upc::where('id', $id)
      ->update([


        'edit_date' => $time,
        'edit_staff' => $staff,
        'pic' =>  $pic,
        'pic1' => $pic1,
        'pic2' =>   $pic2,


      ]);

    return redirect()->back()->with('approved', 'The item( ' . $upc . ' ) has been updated.');

    //return $arr;

  }




  public function detail($id)
  {
    $upcs['upcs'] = Upc::where('id', $id)->get();



    return view('detail')->with($upcs);

    //return $arr;

  }


  public function add_upc()
  {

    return view('add_upc');
  }
  public function review()
  {

    return view('review');
  }


  public function datainput(Request $request)
  {
    $upc = $request->input('upc');

    return view('datainput')->with(['upc' => $upc, 'source' => 'fromEdit']);
  }
  public function subcategory($id)
  {
    echo json_encode(CategoryAll::where('cate', $id)->get());
  }






  public function scan_upc_post(Request $request)
  {



    $request->validate(
      [

        'upc' => 'required',
        'category' => 'required',
        'subcategory' => 'required',
        'brand' => 'required',
        'description' => 'required',

        'size' => 'required',
        'uom' => 'required',
     //   'pic1' => 'required',
      //  'pic2' => 'required',
        'status' => 'required'

      ]
      // [

      //   'pic1.required' => 'The ingredients field is required.',
      //   'pic2.required' => 'The nutrition field is required.',

      // ]

    );



    $time = $request->input('time');
    $staff = $request->input('staff');


    $upc = $request->input('upc');
    $category = $request->input('category');
    $subcategory = $request->input('subcategory');
    $brand = $request->input('brand');
    $description = $request->input('description');
    $size = $request->input('size');
    $uom = $request->input('uom');
    // $corp = $request->input('corp');
    $user_id = $request->input('user_id');
    $add_staff = $request->input('staff');
    $add_source = $request->input('add_source');
    $status = $request->input('status');
    $type = $request->input('type');

  //  dd($type);

    if ($status == 1) {
      $approved = 'Yes';
    } else {
      $approved = 'Pending';
    }




    if ($request->hasFile('pic')) {
      $pic = $request->pic->getClientOriginalName();
      $pic = $upc . "pic" . $pic;

      $request->pic->storeAs('upload_img', $pic, 'public');
    } else {
      $pic = '';
    }
    if ($request->hasFile('pic1')) {
      $pic1 = $request->pic1->getClientOriginalName();
      $pic1 = $upc . "pic1" . $pic1;
      $request->pic1->storeAs('upload_img', $pic1, 'public');
    } else {
      $pic1 = '';
    }

    if ($request->hasFile('pic2')) {
      $pic2 = $request->pic2->getClientOriginalName();
      $pic2 = $upc . "pic2" . $pic2;
      $request->pic2->storeAs('upload_img', $pic2, 'public');
    } else {
      $pic2 = '';
    }




if($type==0){

  $type = 0;

    } else {
      $type = 1;
    }









    Upindi::create([

      'upc' => $upc,
      'category' =>   $category,
      'subcategory' =>     $subcategory,
      'brand' =>  $brand,
      'description' =>    $description,
      'size' =>   $size,
      'uom' =>   $uom,
     // 'corp' =>   $corp,
      'user_id' =>   $user_id,
      'add_date' => $time,


      'add_staff' => $staff,


      'pic' =>  $pic,
      'pic1' => $pic1,
      'pic2' => $pic2,

      'verify' => $status,

      'approved' => $approved,
      'type' => $type,
      'add_source' => $add_source,



    ]);

    return redirect('add_upc')->with('approved', 'The item( ' . $upc . ' ) has been added.');


    return view('add_upc')->with('approved', 'The item( ' . $upc . ' ) has been added.');


    //              return view('datainput')->with([
    // 'category'=> $category,
    // 'subcategory=>'=> $subcategory,
    // 'brand'=> $brand,
    // 'description'=> $description,
    // 'size'=> $size,
    // 'uom'=> $uom,
    // 'pic'=>$pic,
    // 'pic1'=> $pic1,
    //               'pic2'=> $pic2

    //              ]);




    //return $arr;

  }



  public   function  scan(Request $request)
  {



    $output = '';
    $warning = '';
    $query = $request->get('query');
    $upc_data = '';
    $data = '';
    $cv = '';


    if ($query == '') {

      $warning = "<div class='alert alert-danger'> The upc must be filled.</div>";
      // $disabled = "yes";
      return view('add_upc')->with(['warning' => $warning]);
    }

    //dd($query);

    if ($query != '' and  !(strlen($query) == 12 or strlen($query) == 13 or strlen($query) == 8)) {

      $warning = "<div class='alert alert-danger'> The upc length should be 8, 12 or 13 including a check digit at the end.</div>";
      // $disabled = "yes";
      return view('add_upc')->with(['warning' => $warning]);
    }

    if ($query != '' and  (strlen($query) == 12 or strlen($query) == 13 or strlen($query) == 8)) {


      if (strlen($query) == 12) {
        $upc_left2 = substr($query, 0, 12);
        $b2 = str_split($upc_left2);
        $c2 = ($b2[0] + $b2[2] + $b2[4] + $b2[6] + $b2[8] + $b2[10]) * 3;
        $d2 = ($b2[1] + $b2[3] + $b2[5] + $b2[7] + $b2[9]);
        $e2 = $c2 + $d2;
        $f2 = $e2 % 10;
        $g2 = 10 - $f2;
        if ($g2 == 10) {
          $g2 = 0;
        }

        if ($b2[11] == $g2) {
          $cv = '1';
        } else {
          $cv = '0';
        }
      }

      if (strlen($query) == 13) {
        $upc_left3 = substr($query, 0, 13);
        $b3 = str_split($upc_left3);
        $c3 = ($b3[0] + $b3[2] + $b3[4] + $b3[6] + $b3[8] + $b3[10]);
        $d3 = ($b3[1] + $b3[3] + $b3[5] + $b3[7] + $b3[9] + $b3[11]) * 3;
        $e3 = $c3 + $d3;
        $f3 = $e3 % 10;
        $g3 = 10 - $f3;
        if ($g3 == 10) {
          $g3 = 0;
        }

        if ($b3[12] == $g3) {
          $cv = '1';
        } else {
          $cv = '0';
        }
      }


      $data = Upc::where('upc', 'like', $query)->get();
      $data_indi = Upindi::where('upc', 'like', $query)->where('processed', 'like', '')->get();

      //dd($data_indi);


      if (count($data)) {

        foreach ($data as $d) {

          $verify = $d->verify;
          $upc = $d->upc;
          $description = $d->description;
          $category = $d->category;
          $subcategory = $d->subcategory;
          $brand = $d->brand;
          $size = $d->size;
          $uom = $d->uom;
          $source = "upc";
        }
        if ($cv == '1'     and $verify == 1) {
          $output = "<div class='alert alert-danger'> The upc (" . $upc . ") is alrealy in the APL. | status : <span class='text-lg'>Approved</span>  | " . $description . " / " . $brand."/".$category . "-" . $subcategory . " / " . $size . " / " . $uom . "</div>";
        }
        if ($cv == '1'    and $verify == 2) {
          $output = "<div class='alert alert-danger'> The upc (" . $upc . ") is alrealy in the APL. | status : <span class='text-lg'>Pending</span> | " . $description . " / " . $brand."/". $category . "-" . $subcategory
              . " / " . $size . " / " . $uom . "</div>";
        }
        if ($cv == '1'    and $verify == 3) {
          $output = "<div class='alert alert-danger'> The upc (" . $upc . ") is alrealy in the APL. | status : <span class='text-lg'>Denied</span> | " . $description . " / "  . $brand."/".$category . "-" . $subcategory
              . " / " . $size . " / " . $uom . "</div>";
        }

        // $disabled = "yes";    
        $upc_data = $d;
      } else if (count($data_indi)) {

        foreach ($data_indi as $f) {

          $verify_indi = $f->verify;
          // $approved_inidi = $f->approved;
          $upc_indi = $f->upc;
          $description_indi = $f->description;
          $category_indi = $f->category;
          $subcategory_indi = $f->subcategory;
          $brand_indi = $f->brand;
          $size_indi = $f->size;
          $uom_indi = $f->uom;
          $source = "upc_indi";


          // $add_date_indi = $f->add_date;
        }

        if ($cv == '1'     and $verify_indi == 1) {
          $output = "<div class='alert alert-danger'> The upc (" . $upc_indi . ") has been collected. <span
                  class='text-lg'>Approved</span> : " . $description_indi . " / " .$brand_indi . " / "
             . $category_indi . "-" . $subcategory_indi . " / " . $size_indi . " / " . $uom_indi . " </div>";
        }
        if ($cv == '1'    and $verify_indi == 2) {
          $output = "<div class='alert alert-danger'> The upc (" . $upc_indi . ") has been collected.<span
                  class='text-lg'>Pending</span> : " . $description_indi . " / " . $brand_indi . " / "
              .$category_indi . "-" . $subcategory_indi . " / " . $size_indi . " / " . $uom_indi . " </div>";
        }
        if ($cv == '1'    and $verify_indi == 3) {
          $output = "<div class='alert alert-danger'> The upc (" . $upc_indi . ") has been collected. <span
                  class='text-lg'>Denied</span> : " . $description_indi . " / " .$brand_indi . " / "
              . $category_indi . "-" . $subcategory_indi . " / " . $size_indi . " / " . $uom_indi . " </div>";
        }
        if ($cv == '1'    and $verify_indi == '') {
          $output = "<div class='alert alert-danger'> The upc (" . $upc_indi . ") has been collected and waited for
              being processed. " . $description_indi . " / " .$brand_indi . " / "
              . $category_indi . "-" . $subcategory_indi . " / " . $size_indi . " / " . $uom_indi . " </div>";
        }


        $upc_data = $f;
      }
    }



    if ($cv == '0') {
      $warning = "<div class='alert alert-danger'> It has a wrong check digit.  You can check the correct digit <a href='/check_digit'>here</a></div>";
      return view('add_upc')->with(['warning' => $warning]);
    }


    if ($cv == '1' and $upc_data == '') {
      //dd($query);

      return view('datainput')->with(['upc' => $query]);
    } else {

      //dd($query,"else");
      //  $data = array(
      //       'table_data'  => $output,
      //       'upc_data'  => $upc_data,
      //       'upc'  => $query,
      //       'warning'  => $warning,
      //       );

      //echo $cv;
      //  dd($data);

      return view('add_upc')->with(['table_data' => $output, 'upc_data' => $upc_data, 'upc' => $query, 'warning' => $warning, 'noneedcollect' => 'noneed', 'source' => $source]);
      //return view('add_upc')->with($data);



    }











    //'disabled' => $disabled,



    // echo json_encode($data);
  }





  public function add_upc_upload(Request $request)
  {


    $request->image->store('upload_img', 'public');
    echo "done";
  }




  public function vselect(Request $request)
  {
  
      if($request->ajax())
      {
       $output = '';
       $query = $request->get('query');
    if($query !== ''){
$data = Vendor::search($query)->get();  
//dd($data);

    }else{
      $data = 0;
    }
        
        
        if($data !== 0 ){
    $output = array();


           foreach($data as $d){
 
             $id = $d->id;
             $vendorid = $d->vendorid;
             $sname = $d->sname;
             $address = $d->address;
             $city = $d->city;
             $state = $d->state;
             $zip = $d->zip;
             $username = AUTH::user()->name;
             $userid = AUTH::user() ;
    
  
 

$output[] = "<tr class='w-full p-2'>
                 <td class='px-6 py-2'>".$vendorid." / ".$sname." / ".$address." " .$city. " " .$state." " .$zip."</td> <td><a href=".route('vselect.log',[
                  'vendorid'=>$vendorid,
                  'sname'=>$sname,
                  'address'=>$address,
                  'city'=>$city,
                  'state'=>$state,
                  'zip'=>$zip,
                  'username'=>$username,
                  'userid'=>$userid,

                 ])."><button class='btn btn-primary'>Select</button></a></td></tr>";
  
}

            

              }
      
 
 
        }else{
   
 
         $output = "<div class='alert alert-danger'> No vendor found! </div>";
     
     
        }
 
   
  
 
       return $data = array(
          'table_data'  => $output,
    
     
           );

 

          }





          public function vselect_log(Request $request)
          {
        
          
        
            $vendorid = $request->input('vendorid');
            $sname = $request->input('sname');
            $address = $request->input('address');
            $city = $request->input('city');
            $state = $request->input('state');
            $zip = $request->input('zip');
            $username = $request->input('username');
            $userid = $request->input('userid');
    if (!$username) {
    $username =Auth::user()->name;
    }
 
 if (!$userid) {
      $userid = Auth::user()->id;
 }
        
        
            VendorLog::create([
        
              'vendorid' => $vendorid,
              'sname' =>   $sname,
              'address' =>     $address,
              'city' => $city,
              'state' => $state,
              'zip' => $zip,
              'username' => $username,
              'userid' => $userid,
        
        
        
            ]);
        
            return redirect('add_upc')->with('approved', 'You are in the ( ' . $sname . ' ).');
     
        
          }
        






























}







 
