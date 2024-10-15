 
@extends('layouts.admin')

@section('content')
 
 

<div class="p-5">
 
  

          <div class="  items-baseline flex">
             
            <i class="fa fa-fw fa-check fa-3x text-teal-600 "  ></i>
           <div class="text-5xl    text-teal-600">
             Find
           </div>
            <div class="text-2xl text-teal-600 pl-1 ">
           the Check Digit
           </div>                 

        
            

           </div>

          <div class="pl-20" > You can find the correct check digit. </div>	


 

 
  <div class="  items-baseline flex pt-2">
             <input type="text"  id="find_input"  class="form-control w-1/2" placeholder="11 or 12 digit upc WITHOUT the check digit"  autofocus name=a value=""  > 
          
         	 <input type=submit class="btn btn-warning ml-2" id="find" style="display:inline;"value=" FIND ">   
         
     <div id="find_result" class="pl-64 "></div>

      </div>

      
{{-- check --}}

            <div class="  items-baseline flex pt-5">
              <i class="fa fa-fw fa-check fa-3x text-teal-600 "  ></i><div class="text-5xl    text-teal-600">Check</div>
              <div class="text-2xl text-teal-600 pl-1 ">the Check Digit</div>                 
             </div>
            <div class="pl-20" >  You can check if the given check digit is correct or not. </div>	
       
          
 
    <div class="  items-baseline flex pt-2">
             
              <input type="text"  id="check_input"  class="form-control w-1/2" placeholder="12 or 13 digit upc WITH the check digit"  autofocus name=a1
               value=""  > 
            
                <input type=submit class="btn btn-warning ml-2" id="check" style="display:inline;"value=" CHECK ">   
                <div id="check_result" class="pl-64 "></div>
      
        </div>
         {{--convert  --}}
          <div class="  items-baseline flex pt-5">
        
    
              <div class="  items-baseline flex">
                <i class="fa fa-fw fa-check fa-3x text-teal-600 "  ></i><div class="text-5xl    text-teal-600">Convert</div>
                <div class="text-2xl text-teal-600 pl-1">  <a href="http://www.morovia.com/education/utility/upc-ean.asp" target="_blank">
                  UPC-E(8)  <i class="fa fa-exchange-alt" ></i> UPC-A(12)</a> </div>                 
               </div>
  
              </div>
                  <div class="pl-20" >  You can convert UPC-E to UPC-A and vice versa. </div>	      
    
           
      
      <div class="  items-baseline flex pt-2">
         
                <input type="text"   id="convertea_input" class="form-control w-1/2 " placeholder="8 digit upc-e only"  name=txtUPCE value=""  > 
              
                            
           
                <input type=submit class="btn btn-warning ml-2"  id="convertea" style="display:inline;"value=" Convert E to A ">   
           
                <div id="convert_result" class=" pl-64  "></div>
    
          </div>

  <div class="  items-baseline flex py-2">
              
                <input type="text"  id="convertae_input"  class="form-control w-1/2" placeholder="12 digit upc-a only"  name=txtUPCA value=""  > 
              
              	
                <input type=submit class="btn btn-warning ml-2" id="convertae" style="display:inline;"value=" Convert A to E ">   
                {{-- <div id="convertae_result" class=" pl-64 "></div>   --}}
         
    
          </div>


    
          
      
                <div class="  items-baseline flex pt-5">
                   
                  <i class="fa fa-fw fa-check fa-3x text-teal-600 "  ></i>
                 <div class="text-5xl    text-teal-600">
                   PLU
                 </div>
                  <div class="text-2xl text-teal-600 pl-1 ">
                 the Check Digit
                 </div>                 
      
              
                  
      
                 </div>
      
                <div class="pl-20" > You can find the correct check digit. </div>	
      
                
        
       

  <div class="  items-baseline flex pt-2">
                    
                  <input type="text"  id="plu_input"  class="form-control w-1/2" placeholder="4 or 5 digit PLU WITHOUT the check digit"  autofocus name=plu value=""  > 
                
                	 <input type=submit class="btn btn-warning ml-2"  id="plu" style="display:inline;" value=" FIND ">   
                   <div id="plu_result" class="pl-64  "></div>    
            
      
            </div>

 

</div> 
   
  


@endsection

