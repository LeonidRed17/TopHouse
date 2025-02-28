<template>
  <div class="d-flex justify-content-end">
    <div v-for="(emojie, index) in emojiesArray" :key="emojie.id">
      <i class="cursorPointer" :class="emojie.icon_class" @click="selectEmojie(index)" style="font-size:1.5em;"></i>
      <span>{{ emojie.count }}</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Emojies",
  props: {
    reactions: {
      type: Array,
      required: true,
    },
    // Новый пропс для комментариев
    newsId: {
      type: Number,
      required: false,
    },
    commentId: {
      type: Number,
      required: false,
    },
  },
  data() {
    return {
      selectedEmojie: null,
      allReactions: [
        { id: 1, name: "like", icon_class: "bi-hand-thumbs-up-fill" },
        { id: 2, name: "love", icon_class: "bi-heart-fill" },
        { id: 3, name: "laugh", icon_class: "bi-emoji-laughing-fill" },
        { id: 4, name: "surprise", icon_class: "bi-emoji-surprise-fill" },
        { id: 5, name: "heart_eyes", icon_class: "bi-emoji-heart-eyes" },
      ],
      emojiesArray: [],
    };
  },
  methods: {
    mergeReactions() {
      const reactionMap = this.reactions.reduce((acc, reaction) => {
        acc[reaction.id] = reaction.pivot.count;
        return acc;
      }, {});

      this.emojiesArray = this.allReactions.map((reaction) => ({
        ...reaction,
        count: reactionMap[reaction.id] || 0,
      }));
    },
    async sendReaction(reactionId, isAdding) {
      try {
        const response = await fetch(`/api/news/reactions`, {
          method: "POST", // Laravel не принимает JSON через DELETE, поэтому используем POST
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
          },
          body: JSON.stringify({
            news_id: this.newsId,
            reaction_id: reactionId,
            _method: isAdding ? "POST" : "DELETE", // Laravel интерпретирует как DELETE
          }),
        });

        if (!response.ok) {
          throw new Error(`Ошибка ${response.status}: ${response.statusText}`);
        }

        const result = await response.json();
        console.log("Ответ сервера:", result);
      } catch (error) {
        console.error("Ошибка отправки реакции:", error);
      }
    },
    selectEmojie(index) {
      const selected = this.emojiesArray[index];

      if (this.selectedEmojie === selected.id) {
        selected.count -= 1;
        this.sendReaction(selected.id, false); // Убираем реакцию
        this.selectedEmojie = null;
      } else {
        if (this.selectedEmojie !== null) {
          const prevEmojie = this.emojiesArray.find(e => e.id === this.selectedEmojie);
          if (prevEmojie) {
            prevEmojie.count -= 1;
          }
        }
        selected.count += 1;
        this.sendReaction(selected.id, true); // Добавляем реакцию
        this.selectedEmojie = selected.id;
      }
    },
  },
  mounted() {
    this.mergeReactions();
  },
};
</script>

<style scoped>
.cursorPointer {
  cursor: pointer !important;
}

.bi-heart-fill {
  color: #f02849 !important;
}

.bi-hand-thumbs-up-fill {
  color: #f7b928 !important;
}

.bi-emoji-laughing-fill {
  color: #f7b928 !important;
}

.bi-emoji-surprise-fill {
  color: #f7b928 !important;
}

.bi-emoji-heart-eyes {
  color: #f02849 !important;
}
</style>
