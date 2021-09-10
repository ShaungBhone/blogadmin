<template>
  <div>{{ post }}</div>
</template>

<script>
import { onMounted } from "vue";
import adminPostsUse from "../../api/adminPostsUse";
export default {
  props: {
    slug: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const { post, fetchPost } = adminPostsUse();

    onMounted(fetchPost(props.slug));

    return {
      post,
    };
  },
};
</script>