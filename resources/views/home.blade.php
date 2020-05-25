@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <resto-group :restos="{{json_encode($restos)}}"></resto-group>
        </div>
        <div class="row justify-content-center">
            <menu-containers :items="{{json_encode($menus)}}" :resto-id="{{$restoId}}"></menu-containers>
        </div>
    </div>
@endsection
<script>
    // import RestoGroup from "../js/modules/restos/RestoGroup.vue"
    // export default {
    //     components: {RestoGroup},
    // }
</script>
