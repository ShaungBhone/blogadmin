<template>
  <div class="container px-5 mx-auto lg:px-32 mt-10">
    <div class="flex flex-col w-full mb-2 text-left">
      <h1
        class="
          mb-2
          text-2xl
          font-black
          tracking-tightertext-black
          lg:text-5xl
          md:text-3xl
        "
      >
        {{ post.title }}
      </h1>
      <p
        class="
          mt-4
          text-lg
          leading-snug
          tracking-tight
          text-blueGray-500
          lg:w-2/3
        "
      >
        Through the lens of a set of certitudes based on deductions founded on
        false premise.
      </p>
    </div>
    <div class="flex flex-col lg:flex-row lg:space-x-12">
      <div class="w-full max-w-screen-sm m-auto mt-12 lg:w-1/4">
        <div class="p-4 bg-white border rounded-lg hover:bg-gray-100">
          <div class="flex py-2">
            <img
              src="https://d33wubrfki0l68.cloudfront.net/6d60ae66b2a50b1842d08156aeb53663fa328837/d7f97/assets/badges/mike.jpg"
              class="object-cover w-10 h-10 mr-2 rounded-full"
            />
            <div>
              <p class="text-sm font-semibold tracking-tight text-black">
                Mike Andreuzza
              </p>
              <p class="text-sm font-normal tracking-tight text-coolGray-400">
                Yoyo player
              </p>
            </div>
          </div>
          <button
            class="
              w-full
              px-8
              py-2
              mt-4
              text-base text-white
              transition
              duration-500
              ease-in-out
              transform
              bg-blue-600
              border-blue-600
              rounded-md
              focus:shadow-outline
              focus:outline-none
              focus:ring-2
              ring-offset-current ring-offset-2
              hover:bg-blue-800
            "
          >
            Follow on Twitter
          </button>
        </div>
      </div>
      <div
        class="w-full p-4 border rounded-lg mt-12 hover:bg-gray-100 lg:w-3/4"
      >
        <p
          class="pb-6 prose prose-sm sm:prose lg:prose-lg xl:prose-xl"
          v-html="post.body"
        ></p>
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
