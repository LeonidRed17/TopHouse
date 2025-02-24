<template>
    <div class="row justify-content-center">
            <div class="col-8 mt-4 bg-white">
                <h4 class="card-title mb-4 text-center mt-3">Оставить комментарий:</h4>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Имя (по желанию)</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Аноним">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput2"
                        placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary mt-4">Комментировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>

export default {
  name: "CommentForm",
  components: {
  },
  data() {
    return {
      test: "Comments",
    };
  },
};
</script>
<style></style>