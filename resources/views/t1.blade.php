<?

$query = 'milk';
   
$data = App\Models\Category::search($query)->get();    
  

//dd($data);
          if(count($data)  ){
   
             foreach($data as $d){
   
               $cate = $d->cate;
               $subcate = $d->subcate;
               $cate_desc = $d->cate_desc;
               $sub_desc = $d->sub_desc;
               $unit = $d->unit;

               $output = "<tr>
                   <td>".$cate."-".$subcate."</td>
                   <td>".$cate_desc."</td>
                   <td>".$sub_desc."</td>
                   <td>".$unit."</td>
               </tr>";

echo $output;

                }}

