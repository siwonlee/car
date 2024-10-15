 
 
 	<!-- google webfont for nutrition label -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Archivo+Black" >
  
 

 <?
 //$upc = App\Models\Upc::find(1);
// $upcCode = $upc->upc; 


$upcCode = $upc; 

// dd($upcCode);

?>

  {{-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> --}}

   
  
 

<div class="container well">

 

<div class="alert alert-danger p-4">The upc is not our APL.  However, please review the following 3rd party information,if any, for a consideration.</div>



 

 
 
 

<div class="p-4">
  <span class="glyphicon glyphicon-exclamation-sign">  </span>  
  If you have no result, it means either that there is no information regarding the UPC or that the daily searching limit(500) reaches. 
For the latter case, visit <a href="https://www.barcodelookup.com/{{$upcCode}}">here (barcodelookup.com).</a> Worth clicking  
   
    
 
 {{-- <a href="https://ndb.nal.usda.gov/ndb/search/list?qlookup=<?=$upcCode?>&qt=&manu=&SYNCHRONIZER_URI=%2Fndb%2Fsearch%2Flist&SYNCHRONIZER_TOKEN=ab8bca35-1970-4059-80ad-61c779222063&ds=Branded+Food+Products&lookup=<?=$upcCode?>" target=_blank><button type="button" class="btn sm  btn-primary">USDA</button></a>   --}}
 <a href=" https://ndb.nal.usda.gov/fdc-app.html#/?query={{$upcCode}}" target=_blank><button type="button" class="btn sm  btn-primary">USDA</button></a>  

 
 
   <a href="https://www.google.com/search?q=<?=$upcCode?>&source=lnms&tbm=isch&sa=X&ved=0CAgQ_AUoAmoVChMIoYr41Z2GyQIVSkMmCh3skAEC&biw=1920&bih=995" target=_blank><button type="button" class="btn sm  btn-primary">Google image</button></a>

   just in case.
 </div>
 
  
 
 
 
 
<?
 
 $auth_key = "Xi91D8x5k2Ll7Gv6";
$upc_code = $upcCode;
$signature =  base64_encode(hash_hmac('sha1', $upc_code, $auth_key, $raw_output = true));
 
 

$homepage = 'http://www.digit-eyes.com/gtin/v2_0/?upcCode='.$upc_code.'&app_key=/035wDGvZyiV&language=en&signature='.$signature;
//$homepage = 'http://google.com';

$jsonData = @file_get_contents($homepage);


// echo $jsonData;
 
$phpArray = json_decode($jsonData,true);
//print_r($phpArray);
if($phpArray == null){
?>

 

 
<?
}else{
?>




 <div class="  well" style="<?if($upcCode){}else{?>display:none;<?}?>">
<table  class="table table-striped table-condensed">

<tr>
<td>EAN</td>
<td><?print_r($phpArray['upc_code']);?></td>
<td rowspan=3 align=center>
<?if($phpArray['image']==""){?>
	
<img class=img-thumbnail src="no_photo_icon.png" width=50px /><?}else{?>


<img class=img-thumbnail src="<?print_r($phpArray['image']);?>" width=250px >

<?}?>
</td>
</tr>

<tr>
<td>Description</td>
<td><?print_r($phpArray['description']);?></td>
 
</tr>
<tr>
<td>UOM/Brand</td>
<td><?print_r($phpArray['uom']);?> / <?print_r($phpArray['brand']);?></td>
</tr>
<tr>
<td>Link</td>
<td colspan=2><a href="<?print_r($phpArray['product_web_page']); ?>"><?print_r($phpArray['product_web_page']); ?></a></td>
</tr>



<tr>
<td>Ingredients</td>
<td colspan=2><?print_r($phpArray['ingredients']);?></td>
</tr>

<tr>
<td>Nutrition</td>
<td colspan=2><?print_r($phpArray['nutrition']);?></td>
</tr>


</table>	
 

	 	
	
	</div> 
 
   
 
 <iframe src="https://www.buycott.com/upc/<?=$phpArray['upc_code']?>" width=100% height=1600px frameborder=0>
 
 
 
 
 </iframe>
 
   
   
   
     </div> 
 

<?}?>