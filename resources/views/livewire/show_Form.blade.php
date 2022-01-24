@extends('layouts.master')
@section('css')
@livewireStyles

@endsection
@section('page-header')
<!-- breadcrumb -->
@livewireScripts
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <livewire:panier />
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection