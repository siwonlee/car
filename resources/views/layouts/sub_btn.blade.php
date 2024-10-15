
    <ul class="pagination  float-right"  >
    <li class="page-item" @if(($segment2==41) or ($segment2==31) or ($segment2==21) ) style="display:none;" @endif > <a class="page-link"  href="#">Sub category</a></li>

   @if($segment2=='2')

    <li class="page-item"><a class="page-link"  href="{{asset('approved/2/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/2/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/2/3')}}">3</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/2/4')}}">4</a></li>



  @endif

   @if($segment2=='3')

    <li class="page-item"><a class="page-link"  href="{{asset('approved/3/1')}}">1</a></li>

  @endif

   @if($segment2=='5')

    <li class="page-item"><a class="page-link"  href="{{asset('approved/5/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/5/2')}}">2</a></li>


  @endif
    @if($segment2=='6')

    <li class="page-item"><a class="page-link"  href="{{asset('approved/6/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/6/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/6/3')}}">3</a></li>


  @endif

    @if($segment2=='8')

    <li class="page-item"><a class="page-link"  href="{{asset('approved/8/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/8/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/8/3')}}">3</a></li>



  @endif
   @if($segment2=='9')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/9/1')}}">1</a></li>

  @endif
   @if($segment2=='12')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/12/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/12/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/12/3')}}">3</a></li>


  @endif
   @if($segment2=='13')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/13/1')}}">1</a></li>



  @endif
   @if($segment2=='16')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/16/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/16/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/16/3')}}">3</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/16/7')}}">7</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/16/8')}}">8</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/16/9')}}">9</a></li>





  @endif
   @if($segment2=='19')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/19/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/19/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/19/3')}}">3</a></li>

  @endif

{{--
   @if($segment2=='21')
     <form class="form-inline form-group-sm" action="" >
    <input  type=hidden size=1 name=cate value=21></input>
    <input class="form-control" type=text size=1 name=subcate placeholder="<?if($subcate){echo $subcate;}?>"></input>
    <button class=btn> Sub category</button>
     </form>


  @endif

   @if($segment2=='31')
     <form class="form-inline form-group-sm" action="" >
    <input  type=hidden size=1 name=cate value=31></input>
    <input class="form-control" type=text size=1 name=subcate placeholder="<?if($subcate){echo $subcate;}?>"></input>
    <button class=btn> Sub category</button>
     </form>


  @endif

   @if($segment2=='41')
     <form class="form-inline form-group-sm" action="" >
    <input  type=hidden size=1 name=cate value=41></input>
    <input class="form-control" type=text size=1 name=subcate placeholder="<?if($subcate){echo $subcate;}?>"></input>
    <button class=btn> Sub category</button>
     </form>


  @endif
    --}}


   @if($segment2=='50')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/50/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/50/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/50/3')}}">3</a></li>



  @endif



   @if($segment2=='51')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/51/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/51/3')}}">3</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/51/6')}}">6</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/51/9')}}">9</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/51/11')}}">11</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/51/201')}}">201</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/51/202')}}">202</a></li>



  @endif

   @if($segment2=='52')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/2')}}">2</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/4')}}">4</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/6')}}">6</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/9')}}">9</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/11')}}">11</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/12')}}">12</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/14')}}">14</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/19')}}">19</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/22')}}">22</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/25')}}">25</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/27')}}">27</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/201')}}">201</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/202')}}">202</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/203')}}">203</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/204')}}">204</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/52/205')}}">205</a></li>



  @endif


   @if($segment2=='53')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/53/1')}}">1</a></li>
    <li class="page-item"><a class="page-link"  href="{{asset('approved/53/5')}}">5</a></li>
  @endif

   @if($segment2=='54')
    <li class="page-item"><a class="page-link"  href="{{asset('approved/54/2')}}">2</a></li>

  @endif



    </ul>


