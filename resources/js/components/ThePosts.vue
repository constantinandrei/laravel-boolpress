<template>
    <div class="container">
        <div class="row mb-2" v-if="posts">
            <div class="col-md-6" v-for="post in posts">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">
                            <span v-for="tag in post.tags">{{ tag.name }}</span>
                        </strong>
                        <h3 class="mb-0">{{ post.title }}</h3>
                        <div class="mb-1 text-muted">{{ post.created_at }}</div>
                        <p class="card-text mb-auto">{{ post.content }}</p>
                        <router-link :to="{ name: 'posts.show', params: { slug: post.slug } }" class="btn btn-primary">Leggi articolo</router-link>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img :src="getUrl(post.imgUrl)" alt="" class="img-thumbnail">

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import axios from 'axios';

export default {
    data(){
        return {
            posts: []
        }
    },

    methods: {
        fetchPosts(){
            axios.get('api/posts').then(
                resp => this.posts = resp.data
            )
        },

        getUrl(link){
            return "storage/" + link
        }
    },

    mounted(){
        this.fetchPosts()
    }
}
</script>