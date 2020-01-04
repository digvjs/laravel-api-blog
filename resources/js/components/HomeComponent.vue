<template>
    <section>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h3>Select Blog Category</h3>
                <div class="mt-4">
                    <button v-if="!selectedCategoryId" class="btn btn-danger btn-lg ml-4 active" @click="getAllBlogs">All</button>
                    <template v-for="item in categories">
                        <button v-if="selectedCategoryId == item.id" class="btn btn-danger btn-lg ml-4 active" @click="getBlogsByCategoryId(item.id)">{{ item.name }}</button>
                        <button v-else class="btn btn-danger btn-lg ml-4" @click="getBlogsByCategoryId(item.id)">{{ item.name }}</button>
                    </template>
                </div>
            </div>
        </div>
        <hr>
        <h3 class="mt-4">Blogs: <small>(Found {{blogs.length}} results!)</small></h3>
        <div class="row mt-4">
            <div class="col-md-12">
                <div v-if="!blogs.length">
                    <div class="alert alert-info text-center">
                        No records found!
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div v-for="item in blogs" class="col-md-3 mt-3">
                <div class="card p-2">
                    <a href="#" class="text-decoration-none text-dark">
                        <h4>{{ item.title }}</h4>
                        <p>
                            <small><strong>Published by:</strong> <br>{{ item.user.name }}</small>
                        </p>
                        <div class="card-footer text-right">
                            <small><strong>Published on:</strong> <br>{{ item.created_at}}</small>
                        </div>
                        <router-link :to="{ name: 'blog_details', params: { id: item.id } }" class="btn btn-primary btn-block btn-sm">Go to blog</router-link>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<style type="text/css">
    .active {
        background-color: #343a40 !important;
        border-color: #343a40 !important;
    }
</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return {
                categories: [],
                blogs: [],
                selectedCategoryId: null,
            }
        },

        created() {
            this.getCategories();
            this.getAllBlogs();
        },

        methods: {

            getCategories() {
                axios.get( this.$store.state.api_url + '/categories')
                .then(response => {
                    if (response.data) {
                        this.categories = response.data;
                    }
                })
                .catch(err => {
                    console.log('error: ', err);
                })

            },

            getAllBlogs() {
                axios.get( this.$store.state.api_url + '/blogs')
                .then(response => {
                    if (response.data) {
                        this.blogs = response.data;
                    }
                })
                .catch(err => {
                    console.log('error: ', err);
                })
            },

            getBlogsByCategoryId(categoryId) {
                this.selectedCategoryId = categoryId;
                axios.get( this.$store.state.api_url + '/blogs/category/' + categoryId)
                .then(response => {
                    if (response.data) {
                        this.blogs = response.data;
                    } 
                })
                .catch(err => {
                    console.log('error: ', err.response);
                    alert(err.response.data.message);
                })
            },
        }
    }
</script>
