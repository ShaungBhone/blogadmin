<template>
  <article class="container mx-auto">
    <button
      @click="newPost"
      class="
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
        mb-4
        mt-4
      "
    >
      Create New Post
    </button>
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="
              shadow
              overflow-hidden
              border-b border-gray-200
              sm:rounded-lg
            "
          >
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Name
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Title
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Status
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Role
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="post in posts" :key="post.uuid">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img
                          class="h-10 w-10 rounded-full"
                          src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                          alt=""
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Jane Cooper
                        </div>
                        <div class="text-sm text-gray-500">
                          jane.cooper@example.com
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ post.title }}
                    </div>
                    <div
                      v-if="post.excerpt.length != 10"
                      class="text-sm text-gray-500"
                    >
                      {{ post.excerpt.substring(0, 20) + "..." }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      :class="{
                        'bg-green-100 text-green-800': post.published,
                        'bg-red-600 text-gray-100': !post.published,
                      }"
                      class="
                        px-2
                        inline-flex
                        text-xs
                        leading-5
                        font-semibold
                        rounded-full
                      "
                    >
                      {{ !post.published ? "Unpublished" : "Published" }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    Admin
                  </td>
                  <td
                    class="
                      px-6
                      py-4
                      whitespace-nowrap
                      text-right text-sm
                      font-medium
                    "
                  >
                    <a href="#" class="text-blue-600 hover:text-blue-900"
                      >Edit</a
                    >
                    <a href="#" class="text-red-600 hover:text-red-900 ml-2"
                      >Delete</a
                    >
                  </td>
                </tr>

                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>

<script>
import { onMounted } from "vue";
import adminPostsUse from "../../api/adminPostsUse";
import { useRouter } from "vue-router";

export default {
  setup() {
    const { posts, fetchPosts, createPost } = adminPostsUse();

    const router = useRouter();

    const newPost = async () => {
      const post = await createPost();

      router.replace({ name: "admin.posts.edit", params: { slug: post.slug } });
    };

    onMounted(fetchPosts);

    return { posts, newPost };
  },
};
</script>