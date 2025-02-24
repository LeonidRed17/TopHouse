<template>

    <div v-for="news in newsArray" :key="news.id">
        <h3 class="card-title text-center mt-3"> {{news.name}} </h3>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8 mt-4 text-center">
                <img :src="news.img"
                    class="img-fluid" alt="...">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8 mt-3 bg-white text-dark p-3 primaryTextSize">
                <p>{{ news.text }}
                </p>
                <p class="d-flex card-text justify-content-between mt-4">
                    <span class="text-info-emphasis">От кого: {{ news.author }}</span>
                    <span class="text-info-emphasis">Категория: {{ news.category }}</span>
                    <span class="text-info-emphasis">Опубликовано: {{ news.publicationDate }}</span>
                </p>
                <Emojies :reactions="news.reactions" emojiesFor="news"/>
            </div>
        </div>
        <CommentsFeed :comment="news.comments"/>
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
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            Newsname: 'test',
        };
    },
    mounted() {
        //console.log(this.data);
    }
};
</script>