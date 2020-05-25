<template>
  <div class="container menu__container">
    <div class="row">
      <div class="col-md-8">
        <card-component>
          <template slot="title"> My menu componnet</template>
          <template slot="body">
            <div class="section">
              <multiselect v-model="menu" :options="categories"></multiselect>
            </div>
            <menu-groups :items="currentMenuItems"></menu-groups>
          </template>
        </card-component>
      </div>
      <div class="col-md-4">
        <card-component>
          <template slot="title"> My menu componnet</template>
          <template slot="body">
            <menu-add-form
              :categories="categories"
              :resto-id="restoId"
              v-on:newMenuItemAdded="handleNewMenuItem"
            ></menu-add-form>
          </template>
        </card-component>
      </div>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import MenuGroups from "./MenuGroups";
import MenuAddForm from "./MenuAddForm";

export default {
  props: ["items", "restoId"],
  components: {
    Multiselect,
    MenuGroups,
    MenuAddForm
  },
  created() {
    _.forEach(this.items, (item, key) => {
      this.categories.push(key);
    });
    this.menu = this.categories[0];
    this.localItems = this.items;
  },
  data() {
    return {
      localItems: "",
      menu: "",
      categories: []
    };
  },
  computed: {
    currentMenuItems() {
      return this.localItems[this.menu];
    }
  },
  methods: {
    handleNewMenuItem(item, category) {
      console.log("items", item);
      console.log("category", category);
      this.localItems[category].unshift(item);
    }
  }
};
</script>

<style scoped></style>
