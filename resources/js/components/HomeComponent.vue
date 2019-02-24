// HomeComponent.vue

<template>
    <div class="row">
        <div v-if="posts.length > 0" class="col-sm-8 blog-main">
            <div v-for="post in posts" :key="post._id" class="blog-post">
                <h2 class="blog-post-title">{{ post.title }}</h2>
                <p class="blog-post-meta"><small><i>Created on{{ post.created_at }}</i></small></p>
                <div class="text-truncate">{{ post.description }}
                    <router-link :to="{name: 'read', params: { id: post._id }}" class="btn btn-primary">Read more</router-link></div>
            </div>
        </div>
        <div v-else class="col-sm-2 blog-main">
            <p class="text-center text-primary">No Posts published Yet!</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        created() {
            let uri = 'http://localhost:8000/api/posts';
            this.axios.get(uri).then(response => {
                this.posts = response.data.data;
            });
        }
    }
</script>