@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
		
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="card-body">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                    
                                    <h6 class="modal-title">اضافة منتوج</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('contenus.store',['panier'=>$panier->id]) }}" method="post">
                                       
                                        {{ csrf_field() }}
                    
                                       
                                         
                    
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">المنتوج</label>
                                               
                                                <select type="checkbox" class="form-control" id="article" name="article"  required>
                                                    <option value="" selected disabled> --حدد المنتوج--</option>
                                                    @foreach ($articles as $article)
                                                        <option value={{$article->id}}>{{$article->name}}</option>
                                                    @endforeach
                                                    
                            
                                                </select>
                                            </div>
                    
                                    
                                  
                                       <div class="form-group">
                                          
                                           <label  for="recipient-name" class="col-form-label"> الكمية:</label>
                                           <input type="text" class="form-control" id="quantite" name="quantite" required >
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
                    </div>
                    
                    
                </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection