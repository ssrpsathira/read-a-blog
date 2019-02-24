// EditComponent.vue

<template>
    <div>
        <h1>{{ post.title }}</h1>
        <p class="blog-post-meta"><small><i>{{ post.created_at }}</i></small></p>
        <div class="col-sm-8 blog-main">
            <p>{{ post.description }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {}
            }
        },
        created() {
            let uri = `http://localhost:8000/api/post/get/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.post = response.data;
                console.log(this.post);
            });
        }
    }
</script>