// App.vue

<template>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
                </li>
                <li v-if="$auth.check()" class="nav-item">
                    <router-link :to="{ name: 'create' }" class="nav-link">Create Post</router-link>
                </li>
                <li v-if="$auth.check()" class="nav-item">
                    <router-link :to="{ name: 'posts' }" class="nav-link">Posts</router-link>
                </li>
                <li v-if="!$auth.check()" class="nav-item">
                    <router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>
                </li>
                <li v-if="$auth.check()" class="nav-item">
                    <a href="#" @click.prevent="$auth.logout()" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav><br />
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>

<script>

    export default{
    }
</script>