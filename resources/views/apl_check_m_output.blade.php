@extends('layouts.admin')

@section('content')


 
<div class="px-3  py-2">
 
@if($upcs)

<div class="btn btn-danger p-2 w-full">Already in APL(No need to upload)</div>
@endif
<div class="p-4">
@foreach ($upcs as $u )
{{$u->upc}} &emsp; {{$u->brand}}&emsp;{{$u->description}}<br>
@endforeach

</div>

<div class="btn btn-danger p-2 w-full">Please fix the issues(Upload later)</div>


<div class="p-4">
@foreach ($sentupcs as $s )

<?$noneed_to_upload = in_array($s, $inupcs);?>
 
@if(!$noneed_to_upload)

<?  
$rightupc2="";

if(strlen($s)==12){
    $b = str_split($s);
    $c = ($b[0]+$b[2]+$b[4]+$b[6]+$b[8]+$b[10])*3;
    $d = ($b[1]+$b[3]+$b[5]+$b[7]+$b[9]);
    $e = $c + $d;
    $f = $e%10;
    $g = 10-$f;
    
    if($g==10){$g=0;}
    if($g==$b[11]){$rightupc2="ok";}else{$rightupc2="nok";}
    }
     
    if(strlen($s)==13){
     
     $b2 = str_split($s);
    $c2 = ($b2[0]+$b2[2]+$b2[4]+$b2[6]+$b2[8]+$b2[10]);
    $d2 = ($b2[1]+$b2[3]+$b2[5]+$b2[7]+$b2[9]+$b2[11])*3;
    $e2 = $c2 + $d2;
    $f2 = $e2%10;
    $g2 = 10-$f2;
    
     if($g2==10){$g2=0;}
     if($g2==$b2[12]){$rightupc2="ok";}else{$rightupc2="nok";}
    
    } 

    if ($rightupc2=="nok" and strlen($s)==13 ){
 	 echo  $s."&emsp;wrong check digit(".$g2.")<br>";
} 
if ($rightupc2=="nok" and strlen($s)==12){
 	 echo $s."&emsp;wrong check digit(".$g.")<br>";
} 
  
 
if (strlen($s)!=4 and strlen($s)!=5 and strlen($s)!=8 and strlen($s)!=12 and strlen($s)!=13 ){
	 echo  $s."&emsp;wrong length upc<br>";
 }
  
 

 ?>    

 
 
@endif

 



@endforeach

</div>
 
<div class="btn btn-success p-2 w-full">Please Upload</div>

<div class="p-4">
@foreach ($sentupcs as $s )

<?$noneed_to_upload = in_array($s, $inupcs);?>
<?//dd($need_to_upload);?>
@if(!$noneed_to_upload)

<?  
if(strlen($s)==12){
    $b = str_split($s);
    $c = ($b[0]+$b[2]+$b[4]+$b[6]+$b[8]+$b[10])*3;
    $d = ($b[1]+$b[3]+$b[5]+$b[7]+$b[9]);
    $e = $c + $d;
    $f = $e%10;
    $g = 10-$f;
    
    if($g==10){$g=0;}
    if($g==$b[11]){$rightupc2="ok";}else{$rightupc2="nok";}
    }
     
    if(strlen($s)==13){
     
     $b2 = str_split($s);
    $c2 = ($b2[0]+$b2[2]+$b2[4]+$b2[6]+$b2[8]+$b2[10]);
    $d2 = ($b2[1]+$b2[3]+$b2[5]+$b2[7]+$b2[9]+$b2[11])*3;
    $e2 = $c2 + $d2;
    $f2 = $e2%10;
    $g2 = 10-$f2;
    
     if($g2==10){$g2=0;}
     if($g2==$b2[12]){$rightupc2="ok";}else{$rightupc2="nok";}
    
    } 

  
  
 if ($rightupc2=="ok" and (strlen($s)==12 or strlen($s) ==13 or strlen($s)==4 or strlen($s)==5) ){
 
 echo $s."<br>";
  
}

 ?>    

 
@endif

 


@endforeach
 
</div>


<?//dd($inupcs);?>
    




</div>


@endsection
