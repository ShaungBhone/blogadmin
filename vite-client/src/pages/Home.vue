<template>
  <section class="text-gray-700">
    <div class="container flex flex-col items-center px-5 py-8 mx-auto">
      <div class="flex flex-col w-full mb-12 text-left">
        <div class="w-full mx-auto lg:w-3/5">
          <h1
            class="
              mx-auto
              mb-12
              text-2xl
              font-semibold
              leading-none
              tracking-tighter
              text-black
              lg:text-3xl
              title-font
            "
          >
            A small headline to switch your visitors into users.
          </h1>
          <h2
            class="
              mx-auto
              mb-4
              text-xl
              font-semibold
              leading-none
              tracking-tighter
              text-black
              title-font
            "
          >
            A small headline to switch your visitors into users.
          </h2>
          <p
            class="
              mx-auto
              text-base
              font-medium
              leading-relaxed
              text-blueGray-700
            "
          >
            Right. Say that again. No, no, George, look, it's just an act,
            right? Okay, so 9:00 you're strolling through the parking lot, you
            see us struggling.
          </p>
        </div>
      </div>
      <div
        v-for="post in posts"
        :key="post.uuid"
        class="
          flex flex-col
          items-center
          pb-10
          mx-auto
          mb-10
          border-b border-blueGray-200
          sm:flex-row
          lg:w-3/5
        "
      >
        <div
          class="
            inline-flex
            items-center
            justify-center
            flex-shrink-0
            w-20
            h-20
            text-black
            rounded-full
            bg-blueGray-50
            sm:mr-10
          "
        >
          <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.5"
            class="w-10 h-10"
            viewBox="0 0 24 24"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="9"></circle>
            <line x1="3.6" y1="15" x2="14.15" y2="15"></line>
            <line
              x1="3.6"
              y1="15"
              x2="14.15"
              y2="15"
              transform="rotate(72 12 12)"
            ></line>
            <line
              x1="3.6"
              y1="15"
              x2="14.15"
              y2="15"
              transform="rotate(144 12 12)"
            ></line>
            <line
              x1="3.6"
              y1="15"
              x2="14.15"
              y2="15"
              transform="rotate(216 12 12)"
            ></line>
            <line
              x1="3.6"
              y1="15"
              x2="14.15"
              y2="15"
              transform="rotate(288 12 12)"
            ></line>
          </svg>
        </div>
        <div class="flex-grow mt-6 text-center sm:text-left sm:mt-0">
          <router-link :to="{ name: 'post', params: { slug: post.slug } }">
            <h2
              class="
                mb-8
                text-2xl
                font-extrabold
                leading-normal
                text-black
                lg:text-3xl
                title-font
              "
            >
              {{ post.title }}
            </h2>
          </router-link>
          <p class="text-base font-medium leading-relaxed text-blueGray-700">
            {{ post.excerpt }}
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { onMounted } from "vue";
import postsUse from "../api/postsUse";

export default {
  setup() {
    const { posts, fetchPosts } = postsUse();
    onMounted(fetchPosts);
    return { posts };
  },
};
</script>
