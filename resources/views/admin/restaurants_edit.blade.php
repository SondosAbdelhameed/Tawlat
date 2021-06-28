@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">تعديل بيانات المطعم  </h6>
          </div><!-- /.col -->
         <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
            </ol>
          </div>--><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
		
          <div class="col-lg-12">
              <div class="card">
              <!--<div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">

              

 @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-success alert-dismissible fade show" id="formMessage" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endforeach
@endif
                    
<form action="{{route('restaurants.update',$retaurant->id)}}" method="post">
{{csrf_field() }}
{{ method_field('PUT') }}

 <div class="row">
  
 

 
 <div class="col-sm-4">
    <div class="form-group">
      <label for="email"> اسم المطعم</label>
      <input type="text" class="form-control"  name="name_ar" value="{{$retaurant->name_ar}}" required>
    
	 @error('item_name_en')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="email"> اسم المطعم</label>
      <input type="text" class="form-control"  name="name_en" value="{{$retaurant->name_en}}" required>
    
	 @error('item_name_en')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
  </div>
  
   <div class="col-sm-4">
    <div class="form-group">
      <label for="email"> العنوان</label>
      <input type="text" class="form-control"  name="address" value="{{$retaurant->address}}" required>
    
		   @error('item_name_ar')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
  </div>

  
<div class="col-sm-4">
<div class="form-group">
   <label for="email">خط الطول</label>
      <input type="text" class="form-control" name="latitude" value="{{$retaurant->latitude}}">
     @error('barcode')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    </div>
</div>





<div class="col-sm-4">
    <div class="form-group">
      <label for="email">خط العرض</label>
      <input type="number" step="0.0001" class="form-control" name="longitude" value="{{$retaurant->longitude}}" required>
    
     @error('default_discount')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
</div>


  <div class="col-sm-4">
    <div class="form-group">
       <label for="email">المدينة</label>
       <select class="form-control selectpicker"  data-live-search="true" value="{{$retaurant->city_id}}" name="city_id" id="main_category" onChange="main_category_val()">
        <option value="">اختار المدينة</option>
         @foreach($cities as $item)
          
          <option value="{{$item->id}}" {{($item->id == $retaurant->city_id )? 'selected' : '' }}  >{{$item->name}}</option>
          
          @endforeach    
        </select>   
    </div>
  </div>  


 <div class="row">
  
 

 
 <div class="col-sm-4">
    <div class="form-group">
      <label for="email"> الهاتف</label>
      <input type="text" class="form-control"  name="phone" value="{{$retaurant->phone}}" required>
    
   @error('item_name_en')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  </div>
  
   <div class="col-sm-4">
    <div class="form-group">
      <label for="email"> عدد الطاولات</label>
      <input type="text" class="form-control"  name="table_count" value="{{$retaurant->table_count}}" required>
    
       @error('item_name_ar')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  </div>

  
<div class="col-sm-4">
<div class="form-group">
  <label for="email">العدد المسموح</label>
      <input type="text" class="form-control" name="people_limit" value="{{$retaurant->people_limit}}">
    </div>
 </div>
</div>
</div>





</div>
</div>



<!---------------------------------------------------->








 
<div class="col-sm-12">
<button type="submit" class="btn btn-primary">تعديل</button>

</div>

</form>
</div>


</div>





</div>
              <!-- /.card-body -->
            </div>

            
          </div>
          <!-- /.col-md-12 -->
 
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>

//$('.my-select').selectpicker();

    function service_fields_disable(){
document.getElementById("item_more").style.display = "block";
document.getElementById("if_multi_date").style.display = "block";
}

function service_fields_enable(){
document.getElementById("item_more").style.display = "none";
document.getElementById("multi_values").style.display = "none";
document.getElementById("active_multi_val").checked = false;
}

function enable_disable_multival(){
 // Get the checkbox
  var checkBox = document.getElementById("active_multi_val");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
   document.getElementById("multi_values").style.display = "block";
   document.getElementById("if_multi_date").style.display = "none";
  } else {
    document.getElementById("multi_values").style.display = "none";
	document.getElementById("if_multi_date").style.display = "block";
  }
}



</script>

<script type="text/javascript">
          
    $(".add").click(function(){
      
	$(".main").append('<tr> <td> <select name="multi_store[]"  class="form-control select2"> <option value="-1" disabled selected>اختر المخزن</option> <option value="1">دلتا</option> </select> </td> <td><input type="number" name="multi_amount[]"  class="form-control" /></td> <td><input type="number" step="0.0001" name="multi_price[]"  class="form-control" /></td> <td><input type="date" name="multi_production_date[]"  class="form-control" /></td> <td><input type="date" name="multi_expire_date[]"  class="form-control" /></td> <td><input type="text" name="multi_notes[]"  class="form-control" /></td> <td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td> </tr>');
  /*$('.my-select').selectpicker();
		$('.my-select').selectpicker('refresh');
	});*/
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();

         
    });  
   
   /*
     $(function() {
  $('.selectpicker').selectpicker();*/
  selectRefresh();
});

</script>


<script type="text/javascript">
  function selectRefresh() {
  $('.select2').select2({
    tags: true,
    placeholder: "Select an Option",
    allowClear: true,
    width: '100%'
  });
}

$(document).ready(function() {
  selectRefresh();
});
</script>


@endsection