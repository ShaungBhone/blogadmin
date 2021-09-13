<template>
  <div class="container px-5 mx-auto lg:px-32 mt-10">
    <div class="mt-1">
      <ResizeTextarea v-if="post.title">
        <template v-slot:default="{ resize, el }">
          <textarea
            :ref="el"
            v-on:input="resize"
            v-model="post.title"
            class="
              p-0
              resize-none
              focus:ring-0
              focus:border-0
              mt-1
              block
              w-full
              sm:text-sm
              border-none
              text-2xl
              font-black
              tracking-tightertext-black
              lg:text-5xl
              md:text-3xl
            "
          ></textarea>
        </template>
      </ResizeTextarea>

      <Editor
        v-model:modelValue="post.body"
        v-model:excerptValue="post.excerpt"
      />
    </div>
    <div class="mt-8">
      <router-link
        :to="{ name: 'post', params: { slug: post.slug } }"
        class="
          inline-flex
          items-center
          justify-center
          px-4
          py-2
          text-base
          font-medium
          leading-6
          text-white
          whitespace-no-wrap
          bg-blue-600
          border border-blue-700
          rounded-md
          shadow-sm
          hover:bg-blue-700
          focus:outline-none
          focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
        "
      >
        Preview
      </router-link>
      <button
        v-on:click="post.published = !post.published"
        class="
          ml-2
          inline-flex
          items-center
          justify-center
          px-4
          py-2
          text-base
          font-medium
          leading-6
          whitespace-no-wrap
          text-white
          rounded-md
          shadow-sm
          focus:outline-none
        "
        :class="{
          'bg-red-600 hover:bg-red-700 border border-red-700': post.published,
          'bg-blue-600 hover:bg-blue-700 border border-blue-700':
            !post.published,
        }"
      >
        {{ !post.published ? "Publish" : "Unpublish" }}
      </button>
    </div>
  </div>
</template>

<script>
import adminPostsUse from "../../api/adminPostsUse";
import { onMounted, watch } from "vue";
import _ from "lodash";
import ResizeTextarea from "../../components/ResizeTextarea.vue";
import Editor from "../../components/Editor.vue";

export default {
  components: {
    ResizeTextarea,
    Editor,
  },

  props: {
    uuid: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const { post, fetchPost, patchPost } = adminPostsUse();

    const updatePost = async () => {
      await patchPost(props.uuid);
    };

    onMounted(async () => {
      await fetchPost(props.uuid);

      watch(
        () => _.cloneDeep(post),
        _.debounce(() => {
          updatePost();
        }, 500)
      );
    });

    return {
      post,
    };
  },
};
</script>