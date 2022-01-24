@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستفيدين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                اضافة مستفيد</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('edit') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- row -->
<div class="row">


    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                 
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة مستفيد</a>
                   
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='10' style="text-align: center">
                   
                   
                    <thead>

                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الإسم</th>
                                <th class="border-bottom-0">اللقب</th>
                                <th class="border-bottom-0">الجنس</th>
                                <th class="border-bottom-0">المنطقة</th>
                                <th class="border-bottom-0">رقم الهاتف</th>
                                <th class="border-bottom-0">النوع</th>
                           
                                <th class="border-bottom-0">التعليمات</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($beneficiaires as $x)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $x->c_name }}</td>
                                <td>{{ $x->lastame }}</td>
                                @if( $x->sex == 1 )
                                <td>ذكر</td>
                                @elseif( $x->sex == 2 )
                                <td>انثى</td>
                                @endif
                                <td>{{ $x->region }}</td>
                                <td>{{ $x->Ntelephone }}</td>
                                @if( $x->type == 1 )
                                <td>يتيم</td>
                                @elseif( $x->type == 2 )
                                <td>ارملة</td>
                                @elseif( $x->type == 3)
                                <td>محتاج</td>
                                
                                @endif 
                             
                                <td>

                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $x->id }}" data-c_name="{{ $x->c_name }}" data-lastame="{{ $x->lastame }}" data-sex="{{$x->sex  }}" data-region="{{ $x->region }}" data-Ntelephone="{{ $x->Ntelephone }}" data-type="{{ $x->type }}"  data-toggle="modal" href="#exampleModal2"
                                        title="تعديل"><i class="las la-pen"></i></a>



                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $x->id }}" data-c_name="{{ $x->c_name }}" data-toggle="modal" href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>

                                </td>
                          
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

  

    <!-- End Basic modal -->



    <!-- edit -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">

                    <h6 class="modal-title">اضافة عضو</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('beneficiaires.store') }}" method="post">
                       
                        {{ csrf_field() }}

                        <div class="form-group">
                              

                                <label for="recipient-name" class="col-form-label">الاسم :</label>
                                <input type="text" class="form-control" id="c_name" name="c_name" required >
                            </div>
                            <div class="form-group">
                               
                                <label for="recipient-name" class="col-form-label"> اللقب:</label>
                                <input type="text" class="form-control" id="lastame" name="lastame" required>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">الجنس</label>
                               
                                <select type="text" class="form-control" id="sex" name="sex" placeholder="ذكر/أنثى" required>
                                    <option value="" selected disabled> --حدد الجنس--</option>
                                    <option value="1">ذكر</option>
                                    <option value="2">انثى</option>
            
                                </select>
                            </div>

                    
                  
                       <div class="form-group">
                          
                           <label  for="recipient-name" class="col-form-label"> المنطقة:</label>
                           <input type="text" class="form-control" id="region" name="region" required >
                       </div>
                       <div class="form-group">
                      
                        <label for="exampleInputEmail1">رقم الهاتف  :</label>
                        <input type="tel" class="form-control" id="Ntelephone" name="Ntelephone" required>
                    </div>
 
                       
                    <div class="form-group">
                       
                      
                        <label for="exampleInputEmail1">النوع</label>
                        <select type="text" name="type" id="type" class="form-control" required>
                            <option value="" selected disabled> --حددالنوع--</option>
                            <option value="1">يتيم</option>
                            <option value="2">أرملة</option>
                            <option value="3">محتاج</option>
    
                        </select>
                    </div>
                  <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
             </form>
                </div>
            </div>
            </div>
        </div>
        <!-- End Basic modal -->


    </div>

   







    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">تعديل  معلومات العضو</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">

               <form action="beneficiaires/update" method="post" autocomplete="off">
                   {{method_field('PUT')}}
                   {{csrf_field()}}

                   <div class="form-group">
                       <input type="hidden" name="id" id="id" value="">
                       <label for="recipient-name" class="col-form-label">الاسم :</label>
                       <input type="text" class="form-control" id="c_name" name="c_name"  >
                   </div>
                   <div class="form-group">
                       <input type="hidden" name="id" id="id" value="">
                       <label for="recipient-name" class="col-form-label"> اللقب:</label>
                       <input type="text" class="form-control" id="lastame" name="lastame" >
                   </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">الجنس</label>
                    <input type="hidden" name="id" id="id" value="">
                    <select type="text" class="form-control" id="sex" name="sex" placeholder="ذكر/أنثى" >
                        <option value="" selected disabled> --حدد الجنس--</option>
                        <option value="1">ذكر</option>
                        <option value="2">انثى</option>

                    </select>
                </div>
                   <div class="form-group">
                       <input type="hidden" name="id" id="id" value="">
                       <label for="recipient-name" class="col-form-label"> الولاية:</label>
                       <input type="text" class="form-control" id="region" name="region"  >
                   </div>
                 

                   <div class="form-group">
                       <input type="hidden" name="id" id="id" value="">
                       <label for="recipient-name" class="col-form-label">رقم الهاتف  :</label>
                       <input type="tel" class="form-control" id="Ntelephone" name="Ntelephone" >
                   </div>

                   <div class="form-group">
                       
                    <input type="hidden" name="id" id="id" value="">
                    <label for="exampleInputEmail1">النوع</label>
                    <select type="text" name="type" id="type" class="form-control" >
                        <option value="" selected disabled> --حددالنوع--</option>
                        <option value="1">يتيم</option>
                        <option value="2">أرملة</option>
                        <option value="3">محتاج</option>

                    </select>
                </div>
                 
           </div>
           <div class="modal-footer">
               <button type="submit" class="btn btn-primary">تاكيد</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
           </div>
           </form>
       </div>
       
   </div>
   </div>
    
    <!-- delete -->
    <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف المستفيد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="beneficiaires/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- row closed -->

</div>
</div>
</div>
</div>
</div>
</div>

<!-- Container closed -->

<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var c_name = button.data('c_name')
        var lastame = button.data('lastame')
        var sex = button.data('sex')
        var Ntelephone = button.data('Ntelephone')
        var region = button.data('region')
        var type = button.data('type')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #c_name').val(c_name);
        modal.find('.modal-body #lastame').val(lastame);
        modal.find('.modal-body #sex').val(sex);
        modal.find('.modal-body #Ntelephone').val(Ntelephone);
        modal.find('.modal-body #region').val(region);
        modal.find('.modal-body #type').val(type);

    })
</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);

    })
</script>

@endsection
