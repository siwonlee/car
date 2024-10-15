 


@extends('layouts.admin')

@section('content')


<?

$datacount= 0;
foreach($errs as $e){

  $datacount = $datacount + count($e);

 
}

?>
 

<div class="px-3  py-2">
    <div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-sync-alt  text-3xl" ></i> DATA for WOW/SOAR
        </div>
    </div>
 
 
 

<div class="p-4">

<table class="table  table-condensed" id="datatable" style="background-color:#fff;">
    <thead>
        <tr>


            <th>UPC</th>
            <th>Brand</th>
            <th>Short_desc</th>
            <th>Incompletion</th>


        </tr>
    </thead>

<?
//dd($errors['error4']);

?>
<tbody>



 <? $cnt=100 ; $i=0;
?> 
@foreach($errs['error1'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=200 ; $i=0;
?> 
@foreach($errs['error2'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=300 ; $i=0;
?> 
@foreach($errs['error3'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=400 ; $i=0;
?> 
@foreach($errs['error4'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=500 ; $i=0;
?> 
@foreach($errs['error5'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=600 ; $i=0;
?> 
@foreach($errs['error6'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

 
<? $cnt=700 ; $i=0;
?> 
@foreach($errs['error7'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=800 ; $i=0;
?> 
@foreach($errs['error8'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=900 ; $i=0;
?> 
@foreach($errs['error9'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1000 ; $i=0;
?> 
@foreach($errs['error10'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1100 ; $i=0;
?> 
@foreach($errs['error11'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1200 ; $i=0;
?> 
@foreach($errs['error12'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1300 ; $i=0;
?> 
@foreach($errs['error13'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1400 ; $i=0;
?> 
@foreach($errs['error14'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach


<? $cnt=1500 ; $i=0;
?> 
@foreach($errs['error15'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1600 ; $i=0;
?> 
@foreach($errs['error16'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1700 ; $i=0;
?> 
@foreach($errs['error17'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=1800 ; $i=0;
?> 
@foreach($errs['error18'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach



{{-- <? $cnt=1900 ; $i=0;
?> 
@foreach($errs['error19'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach --}}



{{-- move from vendor upload --}}
{{-- <? $cnt=2000 ; $i=0;
?> 
@foreach($errs['error14'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach --}}
{{-- end --}}

{{-- he APL_compare issues --}}

 





 
@if($errs['error21'])
 

<tr><td colspan=4>
<div>
  
  
      
     <label>Just click the button to fix all the APL_compare issues</label>
    
    <a href="{{route('processor.compare')}}"><button class="btn btn-success btn-sm"  type=submit >APL_compare fix</button></a>
    
    
  
   
  
  </div>
</td>
</tr>


@endif

{{-- end --}}


{{-- duplicated upc --}}
 


<? $cnt=2200 ; $i=0;
?> 
@foreach($errs['error17'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>







<tr>	 
    <td>{{$data1->upc}}  </td> 
    <td>{{$data1->brand}}</td>
    <td>{{$data1->short_desc}}</td> 
<td>Duplicated upc   <span class="fa fa-pencil-square-o"  data-toggle="collapse" data-target="#dup{{$cnt}}" 
    title="Edit" style="font-size:20px;"></span>  </td> 
    </tr>
    
    
     
<tr id="dup{{$cnt}}" class="collapse" >
    <td colspan=4 class="alert alert-danger">
    
    <?
    
    $result = Upc::where('upc',$data1->upc)->get();
    
    ?>
    
    @foreach($result as $error_c29_sub)

  Last Modified Date:{{$data_c29_sub->timestamp}} : 	<br>
    {{$data_c29_sub->upc_out}}|{{$data_c29_sub->category_full}}|{{$data_c29_sub->subcat_full}}|NA|{{$data_c29_sub->brand}}|{{$data_c29_sub->long_desc}}
    
    |{{$data_c29_sub->benefit_qt}}|{{$data_c29_sub->benefit_uom_wow}}|NA|{{$data_c29_sub->benefit_qt}}|{{$data_c29_sub->verify_date}}|NA|NA|{{$data_c29_sub->verify}}|{{$data_c29_sub->short_desc}}
    |NA|{{$data_c29_sub->plu_indicator}}|{{$data_c29_sub->end_date}}|{{$data_c29_sub->broadband_flag}}|{{$data_c29_sub->high_cost}}|{{$data_c29_sub->apl_type}}
    
    <a href="duplicate_remove.php?no={{$data_c29_sub->no}}"><button class="btn btn-success ">Remove</button></a><br><br>
    

    @endforeach
    	
  
     





    @endforeach












{{-- end --}}

<? $cnt=2300 ; $i=0;
?> 
@foreach($errs['error23'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=2400 ; $i=0;
?> 
@foreach($errs['error24'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=2500 ; $i=0;
?> 
@foreach($errs['error25'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

<? $cnt=2600 ; $i=0;
?> 
@foreach($errs['error26'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach

 

{{-- APL Type issue --}}
 
 
@if($errs['error27'])
 

<tr><td colspan=4>
<div>
  
  
      
     <label>Just click the button to fix all the APL_type issues</label>
    
    <a href="{{route('processor.apltype')}}"><button class="btn btn-success btn-sm"  type=submit >APL_type fix</button></a>
    
    
  
   
  
  </div>
</td>
</tr>


@endif

{{-- end --}}













{{-- no upc-e conversion --}}
{{-- <? $cnt=2800 ; $i=0;
?> 
@foreach($errs['error28'] as $data1 )
<?
$cnt=$cnt+1; $i=$i+1;
?>
@include('layouts.modal_indi_incomplete', compact('data1','cnt','i'))
@endforeach --}}
 
{{-- end --}}

 
</tbody>
 </table>

 

<div>

    @if ($datacount==0 )
  
    


 
	 <div class="alert alert-success p-4"align=center >Horray!<br> No incomplete DATA..</div>



    @endif
 
	 
	
	 
	 
	 
	 
 
</div>
 
</div>





@endsection

 

