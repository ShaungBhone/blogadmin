<template>
  <div
    class="
      container container
      flex flex-col
      items-center
      px-5
      py-8
      mx-auto
      space-y-8
    "
  >
    <p
      class="
        text-xs
        font-semibold
        tracking-wide
        text-gray-600
        uppercase
        sm:text-center
      "
    >
      20 Nov 2020
    </p>
    <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl">
      <div class="mb-4">
        <a
          href="/"
          aria-label="Article"
          class="
            inline-block
            max-w-lg
            font-sans
            text-3xl
            font-extrabold
            leading-none
            tracking-tight
            text-black
            transition-colors
            duration-200
            hover:text-deep-purple-accent-700
            sm:text-4xl
          "
        >
          <h1>
            {{ post.title }}
          </h1>
        </a>
      </div>
      <div
        v-html="post.body"
        class="
          prose prose-sm
          lg:prose
          mx-auto
          lg:text-lg
          text-base text-gray-700
          md:text-lg
        "
      ></div>
    </div>
    <div class="mb-10 sm:text-center">
      <a href="/" aria-label="Author" class="inline-block mb-1">
        <img
          alt="avatar"
          src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
          class="object-cover w-10 h-10 rounded-full shadow-sm"
        />
      </a>
      <div>
        <a
          href="/"
          aria-label="Author"
          class="
            font-semibold
            text-gray-800
            transition-colors
            duration-200
            hover:text-deep-purple-accent-700
          "
          >Vasile Melinte</a
        >
        <p class="text-sm font-medium leading-4 text-gray-600">Author</p>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from "vue";
import postsUse from "../api/postsUse";
export default {
  props: {
    slug: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const { post, fetchPost } = postsUse();

    onMounted(fetchPost(props.slug));

    return {
      post,
    };
  },
};
</script>
