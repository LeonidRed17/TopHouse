<template>
    {{console.log(comment) }}

  <div v-for="item in comment" :key="item.id" class="mb-5 border-bottom pb-3 primaryTextSize">
    <p>{{item.content}}
    </p>
    <div class="d-flex card-text justify-content-between mt-4">
      <span class="text-info-emphasis">От кого: {{item.author}}</span>
      <span class="text-info-emphasis">Опубликовано: {{item.created_at ?? 'Неизвестно'}}</span>
    </div>
    <Emojies :reactions="item.reactions" :commentId="comment.id"/>
  </div>
</template>
<script>
import Emojies from '~/components/icons/emoji/Emojies.vue';

export default {
  name: "Comment",
  components: {
    Emojies,
  },
  props: {
    comment: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
    };
  },
  mounted() {
   // console.log(this.comment);
  }
};
</script>
<style></style>