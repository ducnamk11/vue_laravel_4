<template>
  <div class="resto-group__wrapper mb-5">
    <div class="row">

      <div class="col-md-4  mb-4" style="
    width: 710px" v-for="resto in localResponse" :key="resto.id">
        <card-component>
          <template slot="title">{{resto.name}}</template>
          <template slot="body">{{resto.location}}</template>
        </card-component>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 " style="width: 710px">
        <card-component v-if="showAddForm">
          <template slot="title">Addnew restauran</template>
          <template slot="body"><a class="click-cursor" @click="handleAddNewResto">+</a></template>
        </card-component>

        <modal height="50%" name="add-new-resto">
          <div class="container-padding">
            <resto-add-form @modelCancel="handleCancel" @addRestoEvent="handleSaveForm"></resto-add-form>
          </div>
        </modal>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  import RestoAddForm from "./RestoAddForm";

  export default {
    components: {RestoAddForm},
    props: ['restos'],
    computed: {
      showAddForm() {
        return this.localResponse.length < 5;
      }
    },
    created(){
        console.log('restos.length',this.restos.length);
        this.localResponse = this.restos;
      },
    data(){
      return{
          localResponse :[]
      }
    },
    methods: {
      handleAddNewResto() {
        this.$modal.show('add-new-resto');
      },
      handleCancel() {
        this.$modal.hide('add-new-resto');
      },
      handleSaveForm(restoData) {
        console.log('restoData', restoData);
        axios.post('/api/resto', restoData).then(response => {
          console.log('respose', response.data);
          this.localResponse.unshift(response.data);
          this.$modal.hide('add-new-resto');

        });
      },
    }
  }
</script>
<style scoped>

</style>
