<template>
  <div class="d-flex justify-content-end">
    <div v-for="(emojie, index) in emojiesArray" :key="emojie.id">
      <i class="cursorPointer" :class="emojie.icon" @click="selectEmojie(index)"
        style="font-size:1.5em;"></i>
      <span>{{ emojie.count }}</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Emojies",
  data() {
    return {
      selectedEmojie: null,
      // Создаем глубокую копию реакций, чтобы они не изменяли данные в родительском компоненте
      emojiesArray: JSON.parse(JSON.stringify(this.reactions)),
    };
  },
  props: {
    reactions: {
      type: Array,
      required: true,
    },
  },
  methods: {
    selectEmojie(index) {
      const selected = this.emojiesArray[index]; // Получаем выбранный эмодзи

      if (this.selectedEmojie === selected.id) {
        // Если уже выбрано то снимаем лайк
        selected.count -= 1;
        this.selectedEmojie = null;
      } else {
        if (this.selectedEmojie !== null) {
          // Если был выбран другой эмодзи, снимаем лайк с предыдущего
          const prevEmojie = this.emojiesArray.find(e => e.id === this.selectedEmojie);
          if (prevEmojie) {
            prevEmojie.count -= 1;
          }
        }
        // Увеличиваем счетчик нажатого эмодзи
        selected.count += 1;
        this.selectedEmojie = selected.id;
      }
    },
  },
};
</script>

<style>
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
