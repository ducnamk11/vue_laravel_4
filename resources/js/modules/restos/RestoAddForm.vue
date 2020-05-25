<template>
  <div class="resto-group__wrapper mp-5">
    <h3>Add new a restauran</h3>
    <form>
      <div class="form-group">
        <label for="name">Name</label>
        <input
          name="name"
          type="text"
          class="form-control"
          v-model="resto.name"
          id="name"
        />
      </div>
      <div class="form-group">
        <label for="location">Address</label>
        <input
          name="location"
          type="text"
          class="form-control"
          v-model="resto.location"
          id="location"
        />
      </div>
      <div class="form-group">
        <label for="tables">Number of Table</label>
        <input
          name="tables"
          type="number"
          class="form-control"
          v-model="resto.tables"
          id="tables"
        />
      </div>
      <button type="button" @click="handleAddForm" class="btn btn-primary">
        Add
      </button>
      <button type="button" @click="handleCancelForm" class="btn btn-danger">
        Cancel
      </button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      resto: this.basicResto()
    };
  },
  methods: {
    basicResto() {
      return { name: "", location: "", tables: 0 };
    },
    handleAddForm() {
      this.$emit("addRestoEvent", this.resto);
    },
    handleCancelForm() {
      this.resto = this.basicResto();
      this.$emit("modelCancel");
    }
  }
};
</script>
