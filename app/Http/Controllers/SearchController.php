<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upc;
use App\Models\Category;
;


class SearchController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

       
        return view('search')->with('upcs','') ;

    }
   
    

    public function general(Request $request)
    {

       
$upc = $request->input('upc');

$result = Upc::search($request->get('upc'))->paginate(10);


// $result = Upc::where('upc', $upc)
//         ->orWhere('brand',$upc)
//         ->orWhere('description',$upc)
//         ->orWhere('short_desc',$upc)
//         ->orWhere('pic',$upc)
//         ->orWhere('pic1',$upc)
//         ->orWhere('pic2',$upc)
//         ->orWhere('benefit_uom_wow',$upc)->get();

return view('search')->with(['upcs'=>$result,'upc'=>$upc]);

       
        
    }


    
    public function edit(Request $request, $id)
    {
 
 
        $request->validate([
        
            'upc' => 'required',
            'category_full' => 'required',
            'subcat_full' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'short_desc' => 'required',
    
            'high_cost' => 'required',
            'benefit_qt' => 'required',
            'benefit_uom_wow' => 'required',
            'verify_date' => 'required',
         

        ]);

 
  


        $time = $request->input('time');
        $staff = $request->input('staff');
    
        $upc = $request->input('upc');          
        
      
  
  
        $verify_date = $request->input('verify_date');
        $category_full = $request->input('category_full');
        $subcat_full = $request->input('subcat_full');
        $brand = $request->input('brand');
        $description = $request->input('description');
        $short_desc = $request->input('short_desc');
 
        $high_cost = $request->input('high_cost');
  
        $benefit_qt = $request->input('benefit_qt');
        
        $benefit_uom_wow = $request->input('benefit_uom_wow');
   
    
 
         $end_date=$request->input('end_date');
  
        $plu_indicator=$request->input('plu_indicator');
        $broadband_flag=$request->input('broadband_flag');
    
        $benefit_uom_wow = strtoupper($benefit_uom_wow);



        Upc::where('id', $id)
              ->update([
 
       
                 'edit_date'=>$time,
                 'edit_staff'=>$staff,
        
    
               'category_full'=>   $category_full,
            'subcat_full'=>     $subcat_full, 
               'brand'=>  $brand, 
              'description'=>    $description,
               'short_desc'=>   $short_desc,
               'long_desc'=>   $short_desc,
      
  
               'high_cost'=>   $high_cost,
            'benefit_uom_wow'=>    $benefit_uom_wow,
            'benefit_qt' => $benefit_qt,
           'end_date'=>       $end_date,
           'verify_date'=>       $verify_date, 
           'plu_indicator'=>$plu_indicator,
           'broadband_flag'=>$broadband_flag,
                 
                 ]);
 




              return redirect()->back()->with('approved','The item( '.$upc.' ) has been updated.');

 

    }




 

}