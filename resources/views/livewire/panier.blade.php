@if (!empty($successMessage))
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ $successMessage }}
</div>
@endif
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button"
                class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
            <p>الخطوة الاولى:معلومات القفة</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button"
                class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
            <p>الخطوة الثانية:معلومات المنتوجات</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button"
                class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}">3</a>
            <p>الخطوة الثالثة: اضافة مستفيدين</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button"
                class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-success' }}" disabled="disabled">4</a>
                
                <p>الخطوة الثالثة: اضافة مستفيدين</p>
                @include('livewire.adpanier')
                @include('livewire.contenus')  
        </div>
       
    </div>

    @include('livewire.attribution')
    @include('livewire.confermation')

       
</div>



