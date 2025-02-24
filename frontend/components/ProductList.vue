<template>
    <div>
      <h1 class="text-danger">Product List</h1>
      <ul v-if="products">
        <li v-for="product in products" :key="product.id">{{ product }}</li>
      </ul>
      <p v-else>Loading...</p>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  
  const products = ref([]);
  
  onMounted(async () => {
    const response = await fetch('http://127.0.0.1:8000/api/test');
    const data = await response.json();
    products.value = data;
  });
  </script>
  