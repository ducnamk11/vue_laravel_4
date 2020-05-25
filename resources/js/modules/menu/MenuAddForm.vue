<template>
  <div class="add_form__wrapper">
    <form v-on:submit.prevent="handleSubmit">
      <div class="form-group">
        <label for="name"> Food item</label>
        <input v-model="food.item" type="text" class="form-control" placeholder="enter food item name">
        <div class="validation-message" v-text="validation.getMessage('item')"></div>
      </div>
      <div class="form-group">
        <label for="name"> sellect category</label>
        <multiselect v-model="food.category" :options="categories"></multiselect>
        <div class="validation-message" v-text="validation.getMessage('category')"></div>
      </div>
      <div class="form-group">
        <label for="name"> Food price</label>
        <input v-model="food.price" type="number" class="form-control" placeholder="enter food item price">
        <div class="validation-message" v-text="validation.getMessage('price')"></div>
      </div>
      <div class="form-group">
        <label for="name"> Food description</label>
        <!--        <input v-model="food.description" type="text" class="form-control" placeholder="enter food item description">-->
        <textarea v-model="food.description" class="form-control" placeholder="enter food item description"> </textarea>
        <div class="validation-message" v-text="validation.getMessage('description')"></div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
  import Multiselect from 'vue-multiselect'
  import Validation from './../../utils/Validation.js'

  export default {
    props: ['categories', 'restoId'],
    data() {
      return {
        food:  this.emptyFoodItem(),
        validation: new Validation()
      }
    },
    methods: {
    emptyFoodItem(){
      return {
        item: '',
        category: '',
        price: 100,
        description: '',
      }
    },
      handleSubmit() {
        let postData = this.food;
        postData.restoId = this.restoId;
        window.axios.post('api/item/save', postData).then(response => {
          this.$emit('newMenuItemAdded', response.data, postData.category);
          this.food= this.emptyFoodItem();
        }).catch(error => {
          console.log('error', error.response);
           if (error.response.status == 442) {
            this.validation.setMessages(error.response.data.errors);
          }
        });
      }
    },
    components: {Multiselect,}
  }
</script>

<style scoped>

</style>
