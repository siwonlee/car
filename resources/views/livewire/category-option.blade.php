<div   >

    <?
      use Illuminate\Http\Request as HttpRequest;
   use Illuminate\Support\Facades\Request;  
 
   if(old('category')){$cate_request = old('category');  }
   if(old('subcategory')){$cate_request = old('subcategory');  }
 
   if( $sub_request){$sub_request = $sub_request ;  }
       

 

      // $sub_request = Request::input('subcategory'); // subcat
  
//dd($cate_request);

//dd($fromModal);

//echo $fromModal;
       ?>

<div class="mb-4 @if ($fromModal=="yes")  form-group row  @endif ">
@if ($fromModal=="yes")

    <label class="mb-2 font-bold text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="category1">

@else

   <label class="block mb-2 font-bold text-gray-700" for="category1">

@endif
    CATEGORY:<font color=red>*</font>
</label>




 
    <?//echo $b;?>
    <?//echo $SelectedCategory;?>
    <?//echo $b;?>
    
@if ($fromModal=="yes")
<div class="col-md-9 col-sm-9 col-xs-9">
   <select wire:model="SelectedCategory" class="block form-control"  name="category" id="category" >
    
    @else

   <select wire:model="SelectedCategory" class="form-control"  name="category" id="category" >   

@endif
   
   <option  >Category</option>
   @foreach($categories as $cate) 
    
      <option value="{{ $cate->cate}}"    > {{ $cate->cate }} - {{ $cate->cate_desc }}</option>
    
    
   @endforeach
   </select>
    
    
   @error('category')<p class="text-red-500">{{ $message }}</p>@enderror
      
   @if ($fromModal=="yes")
</div></div>
 
    
    @else

      </div>
@endif
   

   


   
   <div class="mb-4  @if ($fromModal=="yes")  form-group row  @endif ">
    <label class="block mb-2 font-bold text-gray-700 @if ($fromModal=="yes")
    control-label col-md-3 col-sm-3 col-xs-3
     @endif" for="sub_category">
SUBCATEGORY:<font color=red>*</font>
    </label>
   <?//echo $sub_request;?>

   @if (!is_null($SelectedCategory))
    
   @if ($fromModal=="yes")
<div class="col-md-9 col-sm-9 col-xs-9">
    <select class="block form-control"  name="subcategory">
    
    @else
    <select class="block form-control" name="subcategory">
  

@endif
    

   <option value="" selected>Subcategory</option>
   @foreach($subcategories as $sub)
   <option value="{{ $sub->subcate }}" @if ($sub_request==$sub->subcate) selected @endif>{{ $sub->subcate }} - {{ $sub->sub_desc }}</option>
   @endforeach
   </select>
    
    
   @endif
   




   @error('subcategory')       <p class="text-red-500">{{ $message }}</p>
   @enderror

   @if ($fromModal=="yes")
</div></div>
 
    
    @else

      </div>
@endif


 
   
   
   
   <?//dd($cate_request);?>
   
   </div>
   
    
    