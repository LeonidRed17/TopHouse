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
            reactionsArray: [
                { id: "heart", count: 0, icon: 'bi bi-heart-fill' },
                { id: "thumbUp", count: 0, icon: 'bi-hand-thumbs-up-fill' },
                { id: "laugh", count: 0, icon: 'bi-emoji-laughing-fill' },
                { id: "surpirse", count: 0, icon: 'bi-emoji-surprise-fill' },
                { id: "heartEyes", count: 0, icon: 'bi-emoji-heart-eyes' },
            ],
            newsArray: [],
        };
    },
    created() {
        //пока не получил json эмулирую
        this.newsArray = [
            {
                id: 1,
                name: 'Новые дома',
                text: "This is a wider card with supporting text below",
                category: "Дома",
                img: "https://honka.com/gb/wp-content/uploads/sites/11/2016/06/melody-exterior2-0x820-c-center.jpg",
                author: 'Владимир',
                publicationDate: '20.02.2025',
                reactions: this.copyReactions(),
                comments: [{
                    id: 1,
                    author: "Александр",
                    text: "Ого! классно!",
                    publicationDate: "20.02.2025",
                    reactions: this.copyReactions()
                },
                {
                    id: 2,
                    author: "Владимир",
                    text: "Вау! Круто!",
                    publicationDate: "20.02.2025",
                    reactions: this.copyReactions()
                },
                {
                    id: 3,
                    author: "Николай",
                    text: "Ого! Здорово!",
                    publicationDate: "20.02.2025",
                    reactions: this.copyReactions(),
                }],
            },
        ]
    },
    methods: {
        copyReactions() {

            return this.reactionsArray.map(reaction => ({ ...reaction }));
        }
    },
    mounted() {
        console.log(this.newsArray);
    }
};
</script>
<style>
</style>
