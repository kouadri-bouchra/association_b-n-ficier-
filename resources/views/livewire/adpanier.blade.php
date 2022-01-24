@if($currentStep != 1)
<div style="display: none" class="row setup-content" id="step-1">

@endif

<div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <br>
                <div class="form-row">
                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">رقم الفاتورة</label>

                            <input type="text" wire:model="nump" class="form-control">
                            @error('id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label>تاريخ الفاتورة</label>

                            <input type="date" wire:model="pdate" placeholder="YYYY-MM-DD" class="form-control" value="{{ date('Y-m-d') }}" required>
                            @error('pdate')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                </div>


            </div>
        </div>
    </div>
    <button wire:click="firstStepSubmit" type="button" class="btn btn-success btn-sm nextBtn btn-lg pull-right">التالي
    </button>
</div>

 





