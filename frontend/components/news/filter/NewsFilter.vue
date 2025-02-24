<template>
  <div class="row justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-wrap">
      <div class="mb-2 mt-md-2 mb-md-0">
        <button class="btn btn-primary" @click="show = !show">
          <i class="bi bi-gear"></i> Фильтры
        </button>
      </div>
      <div class="d-flex justify-content-center flex-wrap">
        <CategoriesDropdown v-if="show" :data="categories" @setSelectedCategory="setSelectedCategory"
          ref="categoriesDropdown" />
        <div class="ms-2 mt-3 mt-sm-0" v-if="show">
          <DateFilter ref="dateFilter" @setActiveButton="setActiveButton" />
        </div>
        <div class="mt-3 mt-sm-0 position-relative" v-if="show">
          <p class="mb-2">Подтвердить</p>
          <button @click="fetchData" class="btn btn-success text-center align-items-center">Сортировать</button>
          <button @click="resetFilter" class="btn btn-danger ms-1">Сброс</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import CategoriesDropdown from '~/components/news/filter/CategoriesDropdown.vue';
import DateFilter from '~/components/news/filter/DateFilter.vue';

export default {
  name: "NewsFilter",
  components: { CategoriesDropdown, DateFilter },
  props: {
    data: {
      type: Object,
      required: false,
    },
  },
  data() {
    return {
      show: false,
      selectedOptions: {
        sortingBy: null,
        category: null,
      },
      categories: [
        { id: 1, category_name: 'category' },
        { id: 2, category_name: "category2" },
      ],
    };
  },
  mounted() {
  },
  methods: {
    setActiveButton(value) {
      this.selectedOptions.sortingBy = value;
      console.log(this.selectedOptions);
    },
    setSelectedCategory(value) {
      this.selectedOptions.category = value;
      console.log(this.selectedOptions);
    },
    resetFilter() {
      this.selectedOptions.sortingBy = null;
      this.selectedOptions.category = null;
      this.$refs.dateFilter.reset();
      this.$refs.categoriesDropdown.reset();
      console.log(this.selectedOptions);
    },
    /*
    checkData() {
      if (this.selectedOptions.sortingBy == null && this.selectedOptions.category == null
        || this.selectedOptions.sortingBy == undefined && this.selectedOptions.category == undefined) {
        this.filtersIsNotSelected = true;
        console.log("Фильтр не выбран");
      } else {
        this.filtersIsNotSelected = false;
        console.log("Ищем по фильтру");
      }
       
    }, */
    fetchData() {
      //this.checkData();
      console.log(this.selectedOptions);
    }
    /*
    fetchProducts() {
      try {
        this.$emit('sentValues', this.filteredData);
  
      } catch (error) {
        console.error('Ошибка при загрузке продуктов:', error);
      }
    }
    */
  },
};
</script>
<style scoped>
h2 {
  color: blue;
}
</style>