<template>
  <div class="post">
    <div>
      <div class="header">
        <div class="table">
          <img class="avatar" :src="author.avatar_url" alt="" />
          <span class="title">
            <span class="name">{{ author.name }}</span> posted on
            {{ dateFormat }}
          </span>
        </div>
      </div>
      <div class="body">
        <div class="left">
          <img :src="post.image_url" alt="" />
        </div>
        <div class="right">
          <h3>{{ post.title }}</h3>
          <p>{{ post.body }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  name: "Post",
  props: {
    post: Object,
    author: Object,
  },
  computed: {
    dateFormat() {
      return moment(this.post.created_at).format("dddd, MMMM D, YYYY, HH:mm");
    },
  },
};
</script>

<style lang="scss" scoped>
.post {
  display: block;
  clear: both;
  .avatar {
    width: 30px;
    border-radius: 50%;
  }
  .name {
    color: #ff5e13;
  }
  .header {
    border-bottom: #e3e3e5 1px;
    border-style: none none solid none;
    .table {
      display: table;
      padding: 5px;
      padding-left: 15px;

      .title {
        display: table-cell;
        vertical-align: middle;
        padding-left: 10px;
      }
    }
  }
  .body {
    padding: 5px;
    padding-left: 15px;

    display: flex;
  }
  .left {
    width: 30%;
    img {
      width: 100%;
    }
  }
  .right {
    width: 70%;
    padding: 20px;
    padding-top: 0;

    h3 {
      margin-top: 20px;
    }
  }
}
</style>
