@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="row justify-content-center">
            <menu-containers :items="{{json_encode($menus)}}" :resto-id="{{$restoId}}"></menu-containers>
        </div>
    </div>
@endsection
<script> 
</script>
