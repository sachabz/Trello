<template>
  <div class="hello" v-if="!this.isFetching">
    <h2>Add a category :</h2>
    <input type="text" v-model="category.name" /> <br />
    <button type="button" class="btn btn-success" @click="storeCategory">
      Add a categorie
    </button>
    <div
      class="card m-3"
      style="width: 25rem"
      v-for="(category, index) in this.categories"
      v-bind:key="index"
    >
      <div class="card-header">
        <div v-if="!edit.enabled">
          <p>
            {{ category.name }}
            <button
              type="button"
              class="btn btn-secondary m-1"
              @click="editCategory($event, category)"
            >
              Edit
            </button>
            <button
              type="button"
              class="btn btn-secondary m-1"
              @click="deleteCategory($event, category.id, category.name)"
            >
              Delete
            </button>
          </p>
        </div>
        <div class="edit" v-else>
          <input type="text" v-model="edit.name" /> <br />
          <button @click="saveEditCategory">save changes</button>
        </div>
      </div>
      <Posts :category-id="category.id" />
    </div>

    <div v-if="!edit.enabled">
      <p v-for="(category, index) in this.response" v-bind:key="index">
        categorie name :

        {{ category.name }}

        <button @click="editCategory($event, category)">Edit</button>
        <button @click="deleteCategory($event, category.id, category.name)">
          Delete
        </button>
      </p>
    </div>
    <div class="edit" v-else>
      <input type="text" v-model="edit.name" /> <br />
      <button @click="saveEditCategory">save changes</button>
    </div>
  </div>
</template>

<script>
import Posts from "./Posts";
import {
  myAxiosGet,
  myAxiosEdit,
  myAxiosDelete,
  myAxiosSave,
} from "../utils/utils.js";
export default {
  name: "HelloWorld",
  props: {},
  components: { Posts },
  methods: {
    reloadCategories() {
      myAxiosGet("/categories").then((resp) => {
        this.isFetching = false;
        this.categories = resp;
      });
    },

    storeCategory() {
      myAxiosSave("/categories", this.category).then(() => {
        this.reloadCategories();
      });
    },
    editCategory(_event, category) {
      this.edit = {
        enabled: true,
        id: category.id,
        name: category.name,
      };
    },
    saveEditCategory() {
      myAxiosEdit(`/categories/${this.edit.id}`, { name: this.edit.name }).then(
        () => {
          this.reloadCategories();
          this.edit.enabled = false;
        }
      );
    },

    deleteCategory(_event, id, name) {
      let x = window.confirm(`You want to delete the category ${name}?`);
      if (x) {
        myAxiosDelete(`/categories/${id}?force=true`).then(() => {
          this.reloadCategories();
        });
      }
    },
  },
  data() {
    return {
      categories: undefined,
      posts: undefined,
      isFetching: true,
      edit: {
        enabled: false,
        id: null,
        name: "",
      },
      category: {
        name: "",
      },
    };
  },
  mounted() {
    this.reloadCategories();
    // this.reloadPosts();
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>