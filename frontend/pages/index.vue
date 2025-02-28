<template>
    <HeaderComponent :data="links" />
    <main class="mt-2">
        <div class="container bg-light pt-4">
            <NewsFeed />
        </div>
    </main>
</template>

<script>
import HeaderComponent from '~/components/layout/HeaderComponent.vue';
import NewsFeed from '~/components/news/NewsFeed.vue';

export default {
    components: {
        HeaderComponent,
        NewsFeed
    },
    data() {
        return {

            links: {
                index: "/",
                articlesNew: "articles/create"
            },
            prop: 'test',
        }
    },
    mounted() {
    },
    methods: {
    
        
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