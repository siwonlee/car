  <?
 
if(request()->cate){

$cate=request()->cate;
}else{

$cate=1;

}
?>

			 	 <div class="float-right "  >
		
					<form class="form-signin form-inline"  action="{{route('denied_cate',['cate' => $cate ])}}" method="get" >
			 
							<select   class="form-control"   name=cate style="font-size:13px; "    >
								<option selected   >Choose one </option>  
								<option value="2"  @if($cate ==2)selected @endif  >02-Cheese or Tofu</option>
								<option value="3"  @if($cate ==3)selected @endif  >03-Eggs</option>
								<option value="5"  @if($cate ==5)selected @endif   >05-Breakfast Cereal </option>
								<option value="6"   @if($cate ==6)selected @endif   >06-Legumes</option>
								<option value="8"  @if($cate ==8)selected @endif    >08-Fish</option>
								<option value="9"   @if($cate ==9)selected @endif  >09-Infant Cereal</option>
								<option value="12"  @if($cate ==12)selected @endif   >12-Infant Fruits & Vegetables</option>
								<option value="13"  @if($cate ==13)selected @endif   >13-Infant Meats</option>
								<option value="16"  @if($cate ==16)selected @endif   >16-Bread/Whole Grains</option>
								<option value="19"   @if($cate ==19)selected @endif  >19-Fruit & Vegetables Cash Value</option>
								<option value="21"  @if($cate ==21)selected @endif  >21-Infant Formula(IF)</option>
								<option value="31"  @if($cate ==31)selected @endif   >31-Exempt Infant Formula(EXF)</option>
								<option value="41"  @if($cate ==41)selected @endif  >41-WIC Eligible Nutritionals</option>
								<option value="50"   @if($cate ==50)selected @endif  >50-Yogurt</option>
								
								  
								<option value="51"  @if($cate ==51)selected @endif    >51-Milk-whole</option>
								<option value="52"  @if($cate ==52)selected @endif    >52-Milk Low Fat/fat free</option>
								<option value="53"   @if($cate ==53)selected @endif   >53-Juice-frozen</option>

								<option value="54"   @if($cate ==54)selected @endif   >54-Juice-64oz</option>
								  
							 </select>	
						
						  <button type=submit class=" btn"  ><i class="fa fa-fw fa-search" class="input-group-addon"></i> </button>
					 
				 
					   
					  </form>
				 
 
 
			</div>	