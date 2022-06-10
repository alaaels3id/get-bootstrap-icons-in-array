@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <select name="icon" data-size="auto" id="icon" class="form-control select2_icon">
                            @foreach($icons as $icon)
                                <option data-icon="{{ $icon['icon'] }}" value="{{ $icon['icon'] }}"><span><i class="bi {{ $icon['icon'] }}"></i> {{ Str::of($icon['name'])->headline() }}</span></option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            let callback = (icon) => $('<span><i class="bi ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');

            $('.select2_icon').select2({
                width: "100%",
                templateSelection: callback,
                templateResult: callback,
                allowHtml: true
            });
        });
    </script>
@stop
