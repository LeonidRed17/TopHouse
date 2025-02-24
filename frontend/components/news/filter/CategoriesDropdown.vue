<template>
  <div class="mt-3 mt-sm-0">
    <p class="mb-2">Тема новостей</p>
    <select ref="categoriesSelect" class="form-select mb-4 ms-1 bg-white" @change="sendCategoryValue">
      <option ref="categoriesOption" disabled selected>Тема новости</option>
      <option v-for="category in this.data" :value="category.category_name" :key="category.id">
        {{ category.category_name }}</option>

    </select>
  </div>
</template>
<script>
export default {
  name: "CategoriesDropdown",
  props: {
    data: {
      type: Object,
      required: true,
    }
  },
  data() {
    return {
      selectedCategory: undefined,
    }
  },

  methods: {
    sendCategoryValue(event) {
      this.selectedCategory = event.target.value;
      this.$emit('setSelectedCategory', this.selectedCategory);
      /*console.log(this.selectedCategory);
      console.log(this.data);*/
    },
    reset() {
      this.selectedCategory = null;
      this.$refs.categoriesSelect.value = this.$refs.categoriesOption.value;
    }
  },
  computed: {
    /*
    sortedCategories() {
      console.log(this.categories);
      return this.categories.slice().sort((a, b) => a.category_name.localeCompare(b.category_name));
    },
    */
  },
  mounted() {

  },
};
</script>
<style scoped>
h2 {
  color: blue;
}
</style>