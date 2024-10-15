<?php


//$upcs = App\Models\Upc::where('verify',2)->paginate(20) ;
// $upcs = App\Models\User::find(2) ;


$c_approved = App\Models\Upc::where('verify',1)->count() ;
$c_pending = App\Models\Upc::where('verify',2)->count() ;
$c_denied = App\Models\Upc::where('verify',3)->count() ;
$c_a2 = App\Models\Upc::where('verify',1)->where('category',2)->count() ;
$c_a3 = App\Models\Upc::where('verify',1)->where('category',3)->count() ;
$c_a5 = App\Models\Upc::where('verify',1)->where('category',5)->count() ;
$c_a6 = App\Models\Upc::where('verify',1)->where('category',6)->count() ;
$c_a8 = App\Models\Upc::where('verify',1)->where('category',8)->count() ;
$c_a9 = App\Models\Upc::where('verify',1)->where('category',9)->count() ;
$c_a12 = App\Models\Upc::where('verify',1)->where('category',12)->count() ;
$c_a13 = App\Models\Upc::where('verify',1)->where('category',13)->count() ;
$c_a16 = App\Models\Upc::where('verify',1)->where('category',16)->count() ;
$c_a19 = App\Models\Upc::where('verify',1)->where('category',19)->count() ;
$c_a21 = App\Models\Upc::where('verify',1)->where('category',21)->count() ;
$c_a31 = App\Models\Upc::where('verify',1)->where('category',31)->count() ;
$c_a41 = App\Models\Upc::where('verify',1)->where('category',41)->count() ;
$c_a50 = App\Models\Upc::where('verify',1)->where('category',50)->count() ;
$c_a51 = App\Models\Upc::where('verify',1)->where('category',51)->count() ;
$c_a52 = App\Models\Upc::where('verify',1)->where('category',52)->count() ;
$c_a53 = App\Models\Upc::where('verify',1)->where('category',53)->count() ;
$c_a54 = App\Models\Upc::where('verify',1)->where('category',54)->count() ;




?>
