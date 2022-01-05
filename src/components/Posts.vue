<template>
  <ul class="list-group list-group-flush">
    <li
      class="list-group-item"
      v-for="(post, index) in this.posts"
      v-bind:key="index"
    >
      <div v-if="!edit.enabled">
        <p>
          {{ post.title.rendered }}
          <i class="fa fa-edit m-1" @click="editPost($event, post, post.id)"></i>
          <i
            class="fa fa-times m-1"
            @click="deletePost($event, post.id, post.title.rendered)"
          ></i>
        </p>
      </div>
      <div class="edit" v-else>
        <input type="text" v-model="edit.title" /> <br />
        <button @click="saveEditPost">save changes</button>
      </div>
    </li>
  </ul>
  <input type="text" v-model="post.title" placeholder="Add a post here" />
  <br />
  <button type="button" class="btn btn-success" @click="storePost">
    Add a post
  </button>
</template>

<script>
import {
  myAxiosGet,
  myAxiosEdit,
  myAxiosDelete,
  myAxiosSave,
} from "../utils/utils";

export default {
  name: "Posts",
  props: {
    categoryId: {
      type: Number,
      required: true,
    },
  },

  methods: {
    reloadPosts() {
      myAxiosGet(`/posts?categories[0]=${this.categoryId}`).then((resp) => {
        this.posts = resp;
      });
    },
    storePost() {
      myAxiosSave(
        `/posts?categories[0]=${this.categoryId}&status=publish`,
        this.post
      ).then(() => {
        this.reloadPosts();
      });
    },
    editPost(_event, post) {
      this.edit = {
        enabled: true,
        id: post.id,
        title: post.title.rendered,
      };
    },
    saveEditPost() {
      myAxiosEdit(`/posts/${this.edit.id}`, { title: this.edit.title }).then(
        () => {
          this.reloadPosts();
          this.edit.enabled = false;
        }
      );
    },

    deletePost(_event, id, title) {
      let x = window.confirm(`You want to delete the category ${title}?`);
      if (x) {
        myAxiosDelete(`/posts/${id}?force=true`).then(() => {
          this.reloadPosts();
        });
      }
    },
  },

  mounted() {
    this.reloadPosts();
  },

  data() {
    return {
      posts: [],
      post: {
        title: "",
      },
      edit: {
        enabled: false,
        id: null,
        title: "",
      },
    };
  },
};
</script>