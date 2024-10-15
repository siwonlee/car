<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use Auth;

 
class CheckdigitController extends Controller
{





    public function __construct()
    {
        $this->middleware('auth');
    
 
    }

   
public function index(){

return view('check_digit');
}


    public function find(Request $request)
    {


        if($request->ajax())
        {
         $output = '';
         $a = $request->get('query');


        
       if(strlen($a)==11){
        $upc_left=substr($a,0,11);
        $b = str_split($upc_left);
        
        
        
       $c = ($b[0]+$b[2]+$b[4]+$b[6]+$b[8]+$b[10])*3;
       $d = ($b[1]+$b[3]+$b[5]+$b[7]+$b[9]);
       $e = $c + $d;
       $f = $e%10;
       $g = 10-$f;
       
         
        if($g==10){
            
           $g=0;	 
        }
        
        //echo "<div id='cd' style='display:none'>".$g."</div>" ;
        $output = "<div class='text-3xl' >".$g."</div>" ;
        
           
       }
       
       
        
       if(strlen($a)==12){
        $upc_left1=substr($a,0,12);
        $b1 = str_split($upc_left1);
        
        
       $c1 = ($b1[0]+$b1[2]+$b1[4]+$b1[6]+$b1[8]+$b1[10]);
       $d1 = ($b1[1]+$b1[3]+$b1[5]+$b1[7]+$b1[9]+$b1[11])*3;
       $e1 = $c1 + $d1;
       $f1 = $e1%10;
       $g1 = 10-$f1;
       
         
        if($g1==10){
            
           $g1=0;	 
        }
        
        
        // echo "<div id='cd' style='display:none'>".$g1."</div>" ;
         $output = "<div class='text-3xl' >".$g1."</div>" ;
          
        
       }
    }


    return $data = array(
        'table_data'  => $output,
         
         );



        }
        
        
    


 
 


public function convert(Request $request)

{
 
        if($request->ajax())
        {
            $output = '';
 

$txtUPCE = $request->get('query');

       

            $txtUPCA =  $request->get('query');

     
        
       
       
        
    if(strlen($txtUPCE)==8){
        $upce=substr($txtUPCE,0,8);
        $b4 = str_split($upce);
        
        
       if($b4[6]==0 or $b4[6]==1 or $b4[6]==2){
           $upca =  "0".$b4[1].$b4[2].$b4[6]."0000".$b4[3].$b4[4].$b4[5].$b4[7];
       }
       if($b4[6]==3){
           $upca =  "0".$b4[1].$b4[2].$b4[3]."00000".$b4[4].$b4[5].$b4[7];
       }
        
        if($b4[6]==4){
           $upca =  "0".$b4[1].$b4[2].$b4[3].$b4[4]."00000".$b4[5].$b4[7];
       }
       if($b4[6]==5 or $b4[6]==6 or $b4[6]==7 or $b4[6]==8 or $b4[6]==9){
           $upca =  "0".$b4[1].$b4[2].$b4[3].$b4[4].$b4[5]."0000".$b4[6].$b4[7];
       }
        
          
       //   echo "<div id='cde' style='display:none' >".$txtUPCE." <i class='fa fa-long-arrow-right' aria-hidden='true'></i> ".$upca."</div>" ;
       $output = "<div class='text-3xl' >".$txtUPCE." <i class='fa fa-long-arrow-alt-right'  ></i> ".$upca."</div>" ;  
        
       }
       
       if(strlen($txtUPCA)==12){
        $upca=substr($txtUPCA,0,12);
        $b5 = str_split($upca);
        $c5 = $b5[3].$b5[4].$b5[5];
        $d5 = $b5[4].$b5[5];
        
       if($c5==000 or $c5==100 or $c5==200){
           $upcee =  "0".$b5[1].$b5[2].$b5[8].$b5[9].$b5[10].$b5[3].$b5[11];
       }
       
       if($c5==300 or $c5==400 or $c5==500 or $c5==600 or $c5==700 or $c5==800 or $c5==900){
           $upcee =  "0".$b5[1].$b5[2].$b5[3].$b5[9].$b5[10]."3".$b5[11];
       }
        
       if($d5!="00" and $b5[5]==0){
           $upcee =  "0".$b5[1].$b5[2].$b5[3].$b5[4].$b5[10]."4".$b5[11];
       }
        
       if($d5!="00" and ($b5[5]==1 or $b5[5]==2 or $b5[5]==3 or $b5[5]==4 or $b5[5]==5 or $b5[5]==6 or $b5[5]==7 or $b5[5]==8 or $b5[5]==9 )){
           $upcee =  "0".$b5[1].$b5[2].$b5[3].$b5[4].$b5[5].$b5[10].$b5[11];
       }
        
        
        
          
      //   echo "<div id='cda' style='display:none' >".$txtUPCA." <i class='fa fa-long-arrow-right' aria-hidden='true' style='display:inline;'></i> ".$upcee."</div>" ;
          $output = "<div class='text-3xl' >".$txtUPCA." <i class='fa fa-long-arrow-alt-right'  ></i> ".$upcee."</div>" ;   
        
       } 
         
       return $data = array(
        'table_data'  => $output,
         
         );

}}



    public function check(Request $request)

    {
 
    
            if($request->ajax())
            {
             $output = '';
             $a1 = $request->get('query');
    
         
            if(strlen($a1)==12){
             $upc_left2=substr($a1,0,12);
             $b2 = str_split($upc_left2);
             
             //echo $upc_left2;
             
            $c2 = ($b2[0]+$b2[2]+$b2[4]+$b2[6]+$b2[8]+$b2[10])*3;
            $d2 = ($b2[1]+$b2[3]+$b2[5]+$b2[7]+$b2[9]);
            $e2 = $c2 + $d2;
            $f2 = $e2%10;
            $g2 = 10-$f2;
            
              
             if($g2==10){
                 
                $g2=0;	 
             }
             
  //           echo "<div id='cdt' style='display:none'>".$g2."</div>" ;
  $output = "<div class='text-3xl' >".$g2."</div>" ;              
            }
            
            
             
            if(strlen($a1)==13){
             $upc_left3=substr($a1,0,13);
             $b3 = str_split($upc_left3);
             
             
            $c3 = ($b3[0]+$b3[2]+$b3[4]+$b3[6]+$b3[8]+$b3[10]);
            $d3 = ($b3[1]+$b3[3]+$b3[5]+$b3[7]+$b3[9]+$b3[11])*3;
            $e3 = $c3 + $d3;
            $f3 = $e3%10;
            $g3 = 10-$f3;
            
              
             if($g3==10){
                 
                $g3=0;	 
             }
             
           //    echo "<div id='cdt' style='display:none' >".$g3."</div>" ;
           $output = "<div class='text-3xl' >".$g3."</div>" ;     
             
            }
            
             }

             return $data = array(
                'table_data'  => $output,
                 
                 );




                 
            }



    public function plu(Request $request)

    {
        
                if($request->ajax())
                {
                 $output = '';
                 $plu = $request->get('query');
        
        



        
            if(strlen($plu)==4){
             $plu_left2=substr($plu,0,4);
             $pb2 = str_split($plu_left2);
             
             //echo $upc_left2;
             
            $pc2 = ($pb2[0]+$pb2[2]);
            $pd2 = ($pb2[1]+$pb2[3])*3;
            $pe2 = $pc2 + $pd2;
            $pf2 = $pe2%10;
            $pg2 = 10-$pf2;
            
              
             if($pg2==10){
                 
                $pg2=0;	 
             }
             
          //   echo "<div id='cd_plu' style='display:none'>".$pg2."</div>" ;
          $output = "<div class='text-3xl' >".$pg2."</div>" ;        
            }
             
             
              
            if(strlen($plu)==5){
             $plu_left3=substr($plu,0,5);
             $pb3 = str_split($plu_left3);
             
             
            $pc3 = ($pb3[0]+$pb3[2]+$pb3[4])*3;
            $pd3 = ($pb3[1]+$pb3[3]);
            $pe3 = $pc3 + $pd3;
            $pf3 = $pe3%10;
            $pg3 = 10-$pf3;
            
              
             if($pg3==10){
                 
                $pg3=0;	 
             }
             
           //    echo "<div id='cd_plu' style='display:none' >".$pg3."</div>" ;
           $output = "<div class='text-3xl' >".$pg3."</div>" ;          
             
            }
             
            
     
              

    }

    return $data = array(
        'table_data'  => $output,
         
         );
  }
 
 
  





}
