 <div class="side-menu animate-dropdown">
          <div class="head"><i class="icon fa fa-bars"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @foreach ($categories as $category)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon fa fa-laptop" aria-hidden="true"></i>{{$category->category_name}}</a>
                @if (count($category->sub_categories)>0)
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-lg-4">
                        <ul>
                          @foreach ($category->sub_categories as $sub_cat)
                             <li><a href="{{ route('product.subcategory_product',$sub_cat->id) }}">{{$sub_cat->sub_cat_name}}</a></li>
                          @endforeach
                        </ul>
                      </div>
                      <div class="dropdown-banner-holder"> <a href="#">
                        <img alt="" src="{{$category->image !=null ? asset('assets/backend/image/category/small/'.$category->image) : asset('assets/backend/image/default.png')}}" /></a> </div>
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                @endif
               </li>
                @endforeach
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>