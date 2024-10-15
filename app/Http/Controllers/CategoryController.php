<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\CategoryAll;
use Illuminate\Http\Request;





class CategoryController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $arr = CategoryAll::all();

        //$arr = Category::select('apl_category.*')->join('apl_subcategory', 'apl_category.cate', '=', 'apl_subcategory.cate')->get();

        //dd($arr);
                 return view('search_cate')->with('upcs',$arr);
        // return view('t1')->with('errs',$arr);


    }


    
    public function general(Request $request)
    {
    

    

 
        if($request->ajax())
        {

         $output = '';
         $query = $request->get('query');
      if($query !== ''){
// $data = Category::search($query)->orderby(['cate','subcate'],['asc','asc'])->get();  
$data = CategoryAll::search($query)->orderby('cate')->orderby('subcate')->get();  
// $data = Category::select('apl_category.*')->join('apl_subcategory', 'apl_category.cate', '=', 'apl_subcategory.cate')->search($query)->orderby('apl_category.cate')->orderby('apl_subcategory.subcate')->get(); 
// $data = Category::search($query)->sortable()->orderby('cate')->orderby('subcate')->get();  
//dd($data);
      }else{

        $data = 0;
      }
   
          
          
          if($data !== 0 ){
      $output = array();


             foreach($data as $d){
   
               $cate = $d->cate;
               $subcate = $d->subcate;
               $cate_desc = $d->cate_desc;
               $sub_desc = $d->sub_desc;
               $unit = $d->unit;
               $created = $d->created_at;
            $today=Carbon::today();  
               $id = $d->id;


            //    $date1 = Carbon::createFromFormat('m/d/Y H:i:s', $created);
            //    $date2 = Carbon::createFromFormat('m/d/Y H:i:s', $today);
         
            //    $result = $date1->gt($date2);
               //var_dump($result);


if($created > $today){

             $output[] = "<tr class='w-full p-2'>
                   <td class='px-6 py-2'>".$cate."</td>
                   <td class='px-6 py-2'>".$cate_desc."</td>
                   <td class='px-6 py-2 '>".$subcate."</td>
                   
                   <td class='px-6 py-2'>".$sub_desc."</td>
                   <td class='px-6 py-2'>".$unit."<a href='category/remove/".$id."'><i class='ml-6 fa fa-trash'></i></a></td></tr>";

}else{

$output[] = "<tr class='w-full p-2'>
                   <td class='px-6 py-2'>".$cate."</td>
                   <td class='px-6 py-2'>".$cate_desc."</td>
                   <td class='px-6 py-2 '>".$subcate."</td>
                   
                   <td class='px-6 py-2'>".$sub_desc."</td>
                   <td class='px-6 py-2'>".$unit."</td></tr>";
    
}



 
 
             

                }
        
  //$output = "<table class='table'>".$output."</table>";
   
          }else{
     
   
           $output = "<div class='alert alert-danger'> No Category found! </div>";
       
       
          }
   
   
       
   
         
    
    
   
         return $data = array(
            'table_data'  => $output,
      
       
             );
 
 

 
         
   


            }

}




public function add(Request $request)
{

   


    $cate = $request->input('b'); //category
    $subcate = $request->input('f');  //subcategory        
    $sub_desc = $request->input('g'); //sucat description
    $unit = $request->input('i'); //unit
    
if($cate == 21){$cate_desc = '21-Infant Formula (IF)';}
if($cate == 31){$cate_desc = '31-Exempt Infant Formula (EXF) ';}
if($cate == 41){$cate_desc = '41-WIC Eligible Nutritionals ';}
 
    Category::create([

 
        'cate'=>   $cate,
        'cate_desc'=>   $cate_desc,
 
         'subcate'=>     $subcate,     
         'sub_desc'=>     $sub_desc,     
         'unit'=>  $unit, 
 
 
  
           
          ]);


 

          return redirect()->back()->with('approved','The subcategory ( '.$cate.'-'. $subcate.' ) has been added.') ;

    //return $arr;

}


public function remove($id)
{

     
 
    Category::where('id',$id)->delete();
        
        
    

          return redirect()->back()->with('approved','The subcategory has been removed.') ;

    //return $arr;

}










}