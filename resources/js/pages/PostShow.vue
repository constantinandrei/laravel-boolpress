<template>
    <div class="container">
        <article v-if="post" class="blog-post">
            <h2 class="blog-post-title mb-1">{{post.title}}</h2>
            <p class="blog-post-meta"> <a href="#"></a>{{post.user}}</p>
            <p>
                {{post.content}}
            </p>

            <img style="width: 100%" :src="getUrl(post.imgUrl)" alt="">
        </article>
        <div v-else>
            cariamento
        </div>
    </div>
    
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            post: null
        }
    },

    methods: {
        getUrl(link){
            return "/storage/" + link
        }
    },

    mounted() {
        console.log(this.$route)
        axios.get("/api/posts/" + this.$route.params.slug)
            .then((resp) => {
                this.post = resp.data
            })
    }
}
</script>