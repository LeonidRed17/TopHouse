<template>
    <header>
      <div class="container d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item"><nuxt-link :to="data.index" exact-active-class="nav-link active" class="nav-link" aria-current="page">Новости</nuxt-link></li>
        <li class="nav-item"><nuxt-link :to="data.articlesNew" exact-active-class="nav-link active" class="nav-link">Создать новость</nuxt-link></li>
      </ul>
    </div>
</header>
</template>
<script>
 export default {
    name: "HeaderComponent",
    data() {
      return {
      };
    }, props: {
    data: {
      type: Object,
      required: true,
    }
  },
    mounted() {
    }
  };
</script>