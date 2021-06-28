
@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">تصنيــف المدن</h6>
          </div><!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Store List</li>
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
                <h3 class="card-title">Store Details</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
			   <div class="col-sm-12">
         <a class="btn btn-info" data-effect="effect-sign" data-toggle="modal" href="#modaldemo8">اضافة مدينة </a>
			  </div>

        
<!-- add modal -->


<!-- Modal effects -->
<div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافة مدينة جديدة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>


                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <form  method="POST" action="{{route('cities.store')}}" class="parsley-style-1"  name="selectForm2" novalidate="">
                                        @csrf

                                        <div class="row">
                                            
                                                {{-- title   --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">اسم المدينة</label>
                                                         <input type="text" name="name_en" class="form-control" placeholder="en ادخل اسم المدينة">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">اسم المدينة</label>
                                                         <input type="text" name="name_ar" class="form-control" placeholder="ar ادخل اسم المدينة">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">اسم الدولة</label>
                                                         <select name="country_id" class="form-control">
                                                        <option>اختار الدولة</option>
                                                        @foreach($countries as $item)
                                                          <option value="{{$item->id}}">{{$item->name}}</option>
                                                         @endforeach       
                                                           
                                                        </select>  
                                                    </div>


                                                </div>                                            
                                        </div>

                                        <div class="mg-t-30">
                                            <button class="btn btn-info"  type="submit">اضافة </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Modal effects-->




        
			  <hr>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>اسم المدينة</th>
                    <th>اسم الدولة</th>
                    <th>إعدادات</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cities as $item)
                  <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->name}}</td>
                   <td>{{$item->Country->name}}</td>
          
                    <td>
                      <a href="products/{{$item->id}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a href="#" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                  
                  </tr>
                  @endforeach
            
            
                </tbody>
                </table>
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
  
  <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "csv", "excel", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
  