
import ThePosts from "../components/ThePosts.vue"
import Contacts from "../pages/Contacts.vue"
import PostShow from "../pages/PostShow.vue"

export const routes = [
    { path: "/", component: ThePosts, name: "home" },
    { path: "/contatti", component: Contacts, name: "contacts" },
    { path: "/posts/:slug", component: PostShow, name: "posts.show" },
]