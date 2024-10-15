@extends('layouts.admin')

@section('content')



<?//dd($upcs);?>
 
<div class="px-3  py-2">
    <div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-upload text-3xl" ></i> APL Checker with multiple upcs </div>
    </div>


 
 

<div   class="p-5">
 
<form action="{{route('apl_check_m_output')}}"   class=" "   target=_blank>
<div class=""  > 

<textarea class="form-control" rows="5"   autofocus name="upc"   placeholder="Paste multiple upcs up to 5000.
The upcs must be separated with commas like 123456789012, 234567890123, 345678901234.
" required></textarea>
</div>
 <br>
<div class="col-md-4"  > 
    <button type="submit" class="btn btn-primary"  >Check</button> 
</div>
 
</form> 

  
 

</div>










</div>


@endsection
