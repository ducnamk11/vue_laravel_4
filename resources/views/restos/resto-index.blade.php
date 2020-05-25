@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <resto-group :restos="{{json_encode($restos)}}"></resto-group>
        </div>
    </div>
@endsection
<script> 
</script>
