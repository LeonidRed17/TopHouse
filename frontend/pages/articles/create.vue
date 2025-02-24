<template>
        <HeaderComponent :data="links"/>
        <main>
        <div class="container">
            <h1>Создать статью</h1>

        </div>
        </main>
</template>
<script>
import HeaderComponent from '~/components/layout/HeaderComponent.vue';

export default {
    components: {
        HeaderComponent,
    },
    data() {
        return {
            products: [],
            ass: "propass",
            links: {
                index: "/",
                articlesNew: "/articles/create"
            },
        };
    },
};
</script>