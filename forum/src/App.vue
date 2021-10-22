<template>
  <div class="container">
    <h1>MAQE Forum</h1>
    <p>Your current timezone is: {{ timezone }}</p>
    <ul id="posts">
      <li class="post-item" v-for="item in posts" :key="item.id">
        <Post :post="item" :author="findAuthor(item.author_id)" />
      </li>
    </ul>
  </div>
</template>

<script>
import Post from "./components/Post.vue";
import axios from "axios";
import moment from "moment-timezone";
import _ from "lodash";

export default {
  name: "App",
  components: {
    Post,
  },
  data: () => ({
    posts: [],
    authors: [],
    timezone: null,
  }),
  mounted() {
    this.timezone = moment.tz.guess();
    axios.get("https://maqe.github.io/json/authors.json").then((response) => {
      this.authors = response.data;
    });
    axios.get("https://maqe.github.io/json/posts.json").then((response) => {
      this.posts = response.data;
    });
  },
  methods: {
    findAuthor(author_id) {
      return _.find(this.authors, { id: author_id });
    },
  },
};
</script>

<style lang="scss">
html {
  background: #ececec;
}
.container {
  padding-left: 20%;
  padding-right: 20%;
  text-align: left;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  margin-top: 60px;
}
.t-left {
  text-align: left;
}
#posts {
  list-style: none;
  margin: 0;
  padding: 0;

  .post-item {
    &:nth-child(odd) {
      background-color: white;
    }
    &:nth-child(even) {
      background-color: #d5f3fe;
    }
    margin-bottom: 20px;
    border: #e3e3e5 1px;
    box-shadow: 1px 4px #e3e3e5;
  }
}
</style>
