@if($currentStep != 2)
<div style="display: none" class="row setup-content" id="step-2">
    @endif

    <div class="card">
        <div class="card-body">
            <br>

            <div class="row">
                <div class="col">


                    <div class="mb-4 main-content-label">المنتوجات</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th>اسم المنتوج</th>
                                        <th>كمية المنتوج</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i=0?>
                                    @foreach($product as $x)
                                 
                                    <?php $i++?>
                                    <tr>
                                        <td>{{$i}} <input type="checkbox" wire:model="products_id" value="{{ $x->id }}"  /></td>
                                       
                                        <td>{{$x->name  }}  </td>
                                        <td>{{$x->quantite}} </td>

                                        
                                    </tr>
                                    @endforeach

                                @foreach($bouchra as $item)
                                  <input type="hidden" wire:model="pa_id" value="{{ $item->id }}" />                             
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
				
            </div>



		</div>
        </div>
		<button wire:click="firstSt" type="button" class="btn btn-success btn-sm nextBtn btn-lg pull-right">التالي
		</button>
		<button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">السابق
		
		</button>

      
	