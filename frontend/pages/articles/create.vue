<template>
    <HeaderComponent :data="links" />
    <main>
        <div class="container">
            <h1>Создать новость</h1>
            <p class="mb-2 mt-3"><b>Для создания новости необходимо внести:</b></p>
            <ol>
                <li>Название новости</li>
                <li>Содержание новости</li>
                <li>Имя автора новости</li>
                <li>Тему новости</li>
                <li>Изображение для новости</li>
            </ol>
            <div class="row justify-content-center">
                <input v-model="createNews.title" type="text" class="form-control form-control-lg bg-white"
                    name="news_name" id="news_name" placeholder="Название новости">
                <p class="text-danger" v-if="createNews.title.length > 0 && createNews.title.length < 3">
                    Количество символов должно быть не меньше 3.
                </p>
                <textarea v-model="createNews.content" name="news_content" id="news_content"
                    class="mt-3 form-control form-control-lg bg-white" style="height:200px; resize:none;"
                    placeholder="Содержание новости"></textarea>
                <p class="text-danger" v-if="createNews.content.length > 0 && createNews.content.length < 30">
                    Количество символов должно быть не меньше 30.
                </p>
                <input type="text" v-model="createNews.author" class="mt-3 form-control form-control-lg bg-white"
                    name="news_author" id="news_author" placeholder="Имя автора">
                <p class="text-danger" v-if="createNews.author.length > 0 && createNews.author.length < 3">
                    Количество символов должно быть не меньше 3.
                </p>
                <label for="news_category" class="form-label mt-3">Выбрать тему новости</label>
                <select v-model="createNews.category_id" name="news_category" id="news_category"
                    class="form-control form-control-lg mb-3 ">
                    <option value="" disabled>Выбрать тему новости</option>
                    <option v-for="(category) in categoriesArray" :key="category.id" :value="category.id">
                        {{ category.name }}</option>
                </select>
                <div class="mb-3">
                    <label for="formFile" class="form-label ">Выберите изображение для новости</label>
                    <input class="form-control" type="file" id="formFile" @change="onFileChange" ref="fileInput">
                </div>
                <button type="submit" @click="checkValues()" class="btn btn-success col-4 mb-3">Добавить
                    новость</button>
            </div>
        </div>
    </main>
</template>

<script>
import HeaderComponent from '~/components/layout/HeaderComponent.vue';

export default {
    components: {
        HeaderComponent,
    },
    data() {
        return {
            links: {
                index: "/",
                articlesNew: "/articles/create"
            },
            createNews: {
                title: '',
                content: '',
                author: '',
                img: null,
                category_id: null
            },
            categoriesArray: [],
            selectedImage: null
        };
    },
    methods: {
        async fetchCategories() {
            const response = await fetch('http://127.0.0.1:8000/api/categories');
            this.categoriesArray = await response.json();
        },
        onFileChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.selectedImage = file;
                this.createNews.img = file.name;
            }
        },
        checkValues() {
            const { title, content, author, img, category_id } = this.createNews;
            if (!title || !content || !author || category_id === null || !this.selectedImage) {
                console.log("Есть пустые поля:");
                if (!title) console.log("Название пустое");
                if (!content) console.log("Контент пустой");
                if (!author) console.log("Автор пустой");
                if (category_id === null) console.log("Категория не выбрана");
                if (!this.selectedImage) console.log("Изображение не загружено");
            } else {
                console.log("Все данные заполнены корректно:");
                console.log(this.createNews);
                this.sendNews();
            }
        },
        async sendNews() {
            const formData = new FormData();
            formData.append('title', this.createNews.title);
            formData.append('content', this.createNews.content);
            formData.append('author', this.createNews.author);
            formData.append('category_id', this.createNews.category_id);
            // formData.append('image', this.selectedImage);

            const fileInput = this.$refs.fileInput;
            if (fileInput.files.length > 0) {
                formData.append('image', fileInput.files[0]);
            }

            try {
                const response = await fetch('http://127.0.0.1:8000/api/news', {
                    method: 'POST',
                    body: formData,
                });

                const data = await response.json();
                if (response.ok) {
                    console.log('Новость успешно создана:', data);
                } else {
                    console.error('Ошибка при создании новости:', data);
                }
            } catch (error) {
                console.error('Ошибка при отправке данных:', error);
            }
        }
    },
    watch: {
        categoriesArray() {
            if (this.categoriesArray.length > 0 && this.createNews.category_id === null) {
                this.createNews.category_id = this.categoriesArray[0].id;
            }
        },
    },
    mounted() {
        this.fetchCategories().then(() => {
            console.log(this.categoriesArray);
        });
        if (this.categoriesArray.length > 0) {
            this.createNews.category_id = this.categoriesArray[0].id;
        }
    }
};
</script>