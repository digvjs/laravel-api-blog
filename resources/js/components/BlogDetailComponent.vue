<template>
    <section>
        <div class="row mt-4">
            <div class="col-md-12">
                <router-link class="btn btn-primary btn-sm" :to="{ name: 'home' }"><< Back</router-link>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div v-if="details">
                    <h3>{{ details.title }}</h3>
                    <p><small><strong>Published on : </strong> {{ details.created_at }}</small></p>
                    <hr>
                    <p>{{ details.description }}</p>
                    <hr>
                    <p><small><strong>Published by : </strong> {{ details.user.name }}</small></p>
                </div>
                <div v-else>
                    <div class="alert alert-danger">Invalid blog ID!</div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
        },

        data() {
            return {
                details: null,
            }
        },

        created() {
            this.getBlogDetails();
        },

        methods: {

            getBlogDetails() {

                let blogId = this.$route.params.id;

                axios.get( this.$store.state.api_url + '/blogs/' + blogId)
                .then(response => {
                    if (response.data) {
                        this.details = response.data;
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
