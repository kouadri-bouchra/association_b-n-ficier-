@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التبرعات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                عملية التبرع</span>
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
                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                data-toggle="modal" href="#modaldemo8">اضافة عملية تبرع</a>

            </div>
    <br>
           
   



                         
          
            <div class="card-body">
                
                <div class="table-responsive">
                  
                    <table id="example1" class="table mg-b-0 text-md-nowrap" data-page-length='2'
                    style="text-align: center">
                    <thead>
                            <tr>
                            <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم المتبرع</th>
                                    
                                    <th class="border-bottom-0">نوع المنتوج</th>
                                    <th class="border-bottom-0">اسم المنتوج</th>
                                    <th class="border-bottom-0">الكمية</th>
                                    <th class="border-bottom-0">تاريخ التبرع</th>
                                    <th class="border-bottom-0">التعليمات</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                                @foreach ($liste_b as $x)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $x->bienfaiteur->b_name }} </td>
                                      {{-- coder --}}
                                        @if( $x->product->type == 1 )
                                        <td>غذائية</td>
                                    @elseif( $x->product->type == 2 )
                                        <td>طبية</td>
                                    @elseif( $x->product->type == 3)
                                        <td>مدرسية</td>
                                     @elseif( $x->product->type == 4)
                                        <td>ملابس</td>
                                    @elseif( $x->product->type == 5)
                                        <td>كهرومنزلية</td>
                                    @endif 
                                        <td>{{ $x->product->name}}</td>
                                        <td>{{ $x->quantite}}</td>
                                        <td>{{ $x->created_at}}</td>
                                
                                        <td>
                                        
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                 
                                        data-id="{{ $x->id }}"
                        
                                        data-quantite="{{$x->quantite  }}"
  
                                            data-toggle="modal"
                                        href="#exampleModal2{{ $x->id }}" title="تعديل"><i class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                        data-id="{{ $x->id }}" data-name="{{ $x->pl_name }}"
                                            data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                class="las la-trash"></i></a>
                                    
                                </td>
                                </tr>


    <!-- edit -->

    <div class="modal fade"  id="exampleModal2{{ $x->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات المنتوج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="list/update" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ $x->id }}">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المتبرع</label>
                        <select name="b_name"  id="b_name" class="form-control" required>
                            <option value="" selected disabled> --حدد الاسم--</option>
                            @foreach ( $bienfaiteure as  $bienfaiteures)
                                <option value="{{ $bienfaiteures->id}}">{{ $bienfaiteures->b_name }}</option>
                            @endforeach
                        </select>

                        </div>
           

                           
                            {{-- <div class="form-group">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع المنتوج</label>
                            <select name="p_type" id="p_type" class="form-control" required>
                                <option value="" selected disabled> --حدد النوع--</option>
                                @foreach ( $product as  $products)
                                    <option value="{{ $products->type}}">{{ $products->type }}</option>
                                @endforeach
                            </select>
                            </div> --}}

                            <div class="form-group">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتوج</label>
                                <select name="pl_name" id="pl_name" class="form-control" required>
                                    <option value="" selected disabled> --حدد الاسم--</option>
                                    @foreach ( $product as  $products)
                                        <option value="{{ $products->id}}">{{ $products->name }}</option>
                                    @endforeach
                                </select>
                            </div>
           
                            <div class="form-group">
                                <label for="exampleInputEmail1">الكمية</label>
                                <input type="text" class="form-control" id="quantite" name="quantite" required>

                            </div>

                         

                            <div class="col">
                                <label>تاريخ التبرع</label>
                                <input class="form-control fc-datepicker" name="pl_date" placeholder="YYYY-MM-DD"
                                     value="{{ date('Y-m-d') }}" required>
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


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="modaldemo8">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة تبرع</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('list.store') }}" method="post">
                        {{ csrf_field() }}

                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المتبرع</label>
                        <select name="b_name"  id="b_name" class="form-control" required>
                            <option value="" selected disabled> --حدد الاسم--</option>
                            @foreach ( $bienfaiteure as  $bienfaiteures)
                                <option value="{{ $bienfaiteures->id}}">{{ $bienfaiteures->b_name }}</option>
                            @endforeach
                        </select>


                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">نوع المنتوج</label>
                            <select name="p_type" id="p_type" class="form-control" required>
                                <option value="" selected disabled> --حدد النوع--</option>
                                @foreach ( $product as  $products)
                                    <option value="{{ $products->type}}">{{ $products->type }}</option>
                                @endforeach
                            </select>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">اسم المنتوج</label>
                            <select name="pl_name" id="pl_name" class="form-control" required>
                                <option value="" selected disabled> --حدد الاسم--</option>
                                @foreach ( $product as  $products)
                                    <option value="{{ $products->id}}">{{ $products->name }}</option>
                                @endforeach
                            </select>
           
                            <div class="form-group">
                                <label for="exampleInputEmail1">الكمية</label>
                                <input type="text" class="form-control" id="quantite" name="quantite" required>

                            </div>

                            <div class="col">
                                <label>تاريخ التبرع</label>
                                <input class="form-control fc-datepicker" name="pl_date" placeholder="YYYY-MM-DD"
                                     value="{{ date('Y-m-d') }}" required>
                            </div>
                       

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->


    </div>


    <!-- delete -->
  

        <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="list/destroy" method="post">
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
            </div>
            </form>
        </div>
      
    </div>

 

   



    <!-- row closed -->
</div>
<!-- Container closed -->
</div>


   
<div>
 
                </div> 
            </div>
        </div>
                             
                            
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
        var bl_name = button.data('bl_name')
      
        var p_type = button.data('p_type')
        var pl_name = button.data('pl_name')
        var pl_quantite = button.data('pl_quantite')
        var pl_date= button.data('pl_date')
       
       
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #bl_name').val(bl_name);
        modal.find('.modal-body #bl_lastame').val(bl_lastame);
        modal.find('.modal-body #p_type').val(p_type);
        modal.find('.modal-body #pl_name').val(pl_name);
        modal.find('.modal-body #pl_quantite').val(pl_quantite);
        modal.find('.modal-body #pl_date').val(pl_date);
       
      
        
    })
</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var pl_name = button.data('pl_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #pl_name').val(pl_name);
    })
</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var pl_name = button.data('pl_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #pl_name').val(pl_name);
    })
</script>

@endsection