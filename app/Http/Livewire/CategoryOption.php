<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
   use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;  
     
   
class CategoryOption extends Component
{
 

 

      public $SelectedCategory = '';
 

    public $category = '';
    public $subcategory = '';
    public $cate_request ;
    public $sub_request ;
    public $fromModal ;
 

   //public $cate_request= ; // category
 

    public function mount()
    {
        if (old('category')) {
            $this->SelectedCategory = old('category');}else{
            $this->SelectedCategory = ''; 
        }
        if ( $this->cate_request) {
            $this->SelectedCategory = $this->cate_request;}else{
            $this->SelectedCategory = ''; 
        }
      
    }
    
    public function render()
    {
        return view('livewire.category-option',[
'categories' => Category::all(),
'subcategories' => Subcategory::where('cate', $this->SelectedCategory)->get(),
'cate_request'=>old('category'),
'sub_request'=>$this->sub_request,




        ]);
    }

 

}