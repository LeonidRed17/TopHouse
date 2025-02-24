<template>
    <HeaderComponent :data="links" />
    <main class="mt-2">
        <div class="container bg-light pt-4">
            <NewsFeed />
            <ProductList :products="products" />
            {{ products }}
            <br>
            <Modal :data="prop" />
        </div>
    </main>
</template>

<script>
import ProductList from '~/components/ProductList.vue';
import Modal from '~/components/Modal.vue';
import HeaderComponent from '~/components/layout/HeaderComponent.vue';
import NewsFeed from '~/components/news/NewsFeed.vue';

export default {
    components: {
        ProductList,
        Modal,
        HeaderComponent,
        NewsFeed
    },
    data() {
        return {
            products: [],
            links: {
                index: "/",
                articlesNew: "articles/create"
            },
            prop: 'test',
        }
    },
    mounted() {
        /*
        this.fetchProducts();
        */
    },
    methods: {
    
        async fetchProducts() {
            const response = await fetch('http://127.0.0.1:8000/api/test');
            const data = await response.json();
            this.products = data;
        }
        
    }
};
</script>

<style>
.primaryTextSize{
    font-size: 1.2rem !important;
};

.secondaryTextSize{
    font-size: 1.1rem !important;
};



</style>