<template>
  {{console.log(comment) }}

  <div class="row justify-content-center">
    <div class="col-12 col-xl-8 mt-4 bg-white">
      <h4 class="card-title text-center mt-3">Последние комментарии:</h4>
      <div class="text-dark p-3">
        <Comment :comment="comment"/>
        <CommentForm />
      </div>
    </div>
  </div>
</template>
<script>
import CommentForm from '~/components/news/CommentForm.vue';
import Comment from '~/components/news/Comment.vue';
export default {
  name: "CommentsFeed",
  components: {
    CommentForm,
    Comment,
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
  mounted(){
    //console.log(this.comment);
  }
};
</script>

<style></style>
