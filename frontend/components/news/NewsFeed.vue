<template>
    <h1 class="text-center mb-4"><b>Новости</b></h1>
    <NewsFilter />
    <News :newsArray="newsArray" />
</template>
<script>
import News from '~/components/news/News.vue';
import NewsFilter from '~/components/news/filter/NewsFilter.vue';

export default {
    name: "NewsFeed",
    components: {
        News,
        NewsFilter
    },

    data() {
        return {
            newsArray:[],
        };
    },
    methods: {
        async fetchNews() {
            const response = await fetch('http://127.0.0.1:8000/api/news');
            this.newsArray = await response.json();
        }
    },
    mounted() {
        console.log(this.newsArray); 
        this.fetchNews().then(() => {
            console.log(this.newsArray); 
        });
    }
};
</script>
<style></style>
