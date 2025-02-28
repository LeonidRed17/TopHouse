<template>
{{console.log(newsArray) }}
    <div v-for="news in newsArray" :key="news.id">
        {{ console.log(news) }}
        <h3 class="card-title text-center mt-3"> {{ news.title }} </h3>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8 mt-4 text-center">
                <img :src="news.img" class="img-fluid" alt="...">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8 mt-3 bg-white text-dark p-3 primaryTextSize">
                <p>{{ news.content }}
                </p>
                <p class="d-flex card-text justify-content-between mt-4">
                    <span class="text-info-emphasis">От кого: {{ news.author }}</span>
                    <span class="text-info-emphasis">Категория: {{ news.category ?? 'Неизвестно'}}</span>
                    <span class="text-info-emphasis">Опубликовано: {{ news.created_at ?? 'Неизвестно'}}</span>
                </p>
                <Emojies :reactions="news.reactions" :newsId="news.id" />
            </div>
        </div>
        <CommentsFeed :comment="news.comments" />
    </div>
</template>
<script>
import Emojies from '~/components/icons/emoji/Emojies.vue';
import CommentsFeed from '~/components/news/CommentsFeed.vue';

export default {
    name: "News",
    components: {
        Emojies,
        CommentsFeed,
    },
    props: {
        newsArray: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            Newsname: 'test',
        };
    },
    mounted() {
        //console.log(this.newsArray);
    },
    watch: {
        newsArray: {
            handler(newValue) {
                console.log("newsArray обновился:", JSON.parse(JSON.stringify(newValue)));
                //console.log(newValue.comments);
            },
            immediate: true // Запускает обработчик сразу при монтировании
        }
    }
};
</script>