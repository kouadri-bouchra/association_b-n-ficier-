@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">القفة الشهرية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ محتوى القفة</span>
                    
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
<div class="row row-sm">
    <!--div-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
         <div class="d-flex justify-content-between">
                <h4>رقم القفة: {{$panier->id}}</h4>
                    <h4>اسم القفة:{{$panier->nump}}  </h4>
                <h4>تاريخ القفة:{{$panier->pdate}}</h4>
                
            </div>
            <br>
        
            <div class="d-flex justify-content-between">
                @if(auth()->user()->hasRole())
                <a class="btn btn-primary"  href={{route('contenus.create',['panier'=>$panier->id])}}>اضافة منتوج</a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
            <thead>
                <tr>
                    <th class="border-bottom-0">#</th>
                    <th class="border-bottom-0">رمز المنتوج  </th>
                    <th class="border-bottom-0">اسم المنتوج</th>
                    <th class="border-bottom-0">كمية المنتوج </th>
                
                
                    
                </tr>
            </thead>
            <tbody>
                @php
                $i = 0;
                @endphp
               
               @foreach ($panier->contenus as $contenu)
                    @php
                    $i++
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        @if( $contenu->produit->type == 1 )
                        <td>غذائية</td>
                        @elseif( $contenu->produit->type == 2 )
                        <td>طبية</td>
                        @elseif( $contenu->produit->type == 3 )
                        <td>مدرسية</td>
                        @elseif( $contenu->produit->type == 4 )
                        <td>ملابس</td>
                        @elseif( $contenu->produit->type == 5)
                        <td>كهرومنزلية</td>
                        @endif
                        <td>{{$contenu->produit->name}}</td>
                        <td>{{$contenu->quantite}} </td>
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

</div>

<h4 class="content-title mb-0 my-auto">المستفيدين من القفة</h4>
@if(auth()->user()->hasRole())
<a class="btn btn-primary" href={{route('attributions.index',['panier'=>$panier->id])}}>اضافة المستفيدين</a>
@endif
    <!--div-->
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                   
                    
                </div>
<div class="card-body">
    <div class="table-responsive">
      
<table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
<thead>
    <tr>
        <th class="border-bottom-0">#</th>
        <th class="border-bottom-0">الاسم </th>
        <th class="border-bottom-0">اللقب</th>
        <th class="border-bottom-0">التعليمات</th>
    
    
        
    </tr>
</thead>
<tbody>
    @php
    $i = 0;
    @endphp
   
   @foreach ($panier->attributions as $a)
        @php
        $i++
        @endphp
        <tr>
            <td>{{$i}}</td>
            <td>{{$a->beneficiaire->c_name}}</td>
            <td>{{$a->beneficiaire->lastame}}</td>
            <td>
               @if($a->beneficiaire->beneficiaireDe($panier)==null)
                <a class="btn btn-primary" href="{{route('attributions.create',compact('beneficiaire','panier'))}}"><i class="fa fa-eye" aria-hidden="true" data-method="POST"></i>إضافة</a>
              @else
                <form action="{{ route('attributions.destroy',$a->beneficiaire->beneficiaireDe($panier))  }}" method="POST">                      
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                   <button type="submit" class="btn btn-danger">Supprimer</i></button>                       
                </form>
              @endif

            </td>
        </tr>    
    @endforeach
    
</tbody>
</table>
</div>
</div>
</div>

</div>









<!--/div-->
</div>
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
@endsection