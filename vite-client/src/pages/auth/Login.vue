<template>
  <!-- Section 1 -->
  <section class="w-full px-8 py-16 bg-gray-100 xl:px-8">
    <div class="max-w-5xl mx-auto">
      <div class="flex flex-col items-center md:flex-row">
        <div class="w-full space-y-5 md:w-3/5 md:pr-16">
          <p class="font-medium text-blue-500 uppercase">Building Businesses</p>
          <h2
            class="
              text-2xl
              font-extrabold
              leading-none
              text-black
              sm:text-3xl
              md:text-5xl
            "
          >
            Changing The Way People Do Business.
          </h2>
          <p class="text-xl text-gray-600 md:pr-16">
            Learn how to engage with your visitors and teach them about your
            mission. We're revolutionizing the way customers and businesses
            interact.
          </p>
        </div>
        <div class="w-full mt-16 md:mt-0 md:w-2/5">
          <form v-on:submit.prevent="login">
            <div
              class="
                relative
                z-10
                h-auto
                p-8
                py-10
                overflow-hidden
                bg-white
                border-b-2 border-gray-300
                rounded-lg
                shadow-2xl
                px-7
              "
            >
              <h3 class="mb-6 text-2xl font-medium text-center">
                Sign in to your Account
              </h3>
              <input
                v-model="form.email"
                type="text"
                name="email"
                class="
                  block
                  w-full
                  px-4
                  py-3
                  mb-3
                  border border-transparent border-gray-200
                  rounded-lg
                  focus:ring focus:ring-blue-500
                  focus:outline-none
                "
                placeholder="Email address"
              />
              <p class="text-red-500 m-2" v-if="errors.email">
                {{ errors.email[0] }}
              </p>
              <input
                v-model="form.password"
                type="password"
                name="password"
                class="
                  block
                  w-full
                  px-4
                  py-3
                  mb-3
                  border border-transparent border-gray-200
                  rounded-lg
                  focus:ring focus:ring-blue-500
                  focus:outline-none
                "
                placeholder="Password"
              />
              <p class="text-red-500 m-2" v-if="errors.password">
                {{ errors.password[0] }}
              </p>
              <div class="block">
                <button
                  type="submit"
                  class="
                    w-full
                    px-3
                    py-4
                    font-medium
                    text-white
                    bg-blue-600
                    rounded-lg
                  "
                >
                  Sign in
                </button>
              </div>
              <p class="w-full mt-4 text-sm text-center text-gray-500">
                Don't have an account?
                <a href="#_" class="text-blue-500 underline">Sign up here</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { useStore } from "vuex";
import { reactive, ref } from "vue";
import { useRouter } from "vue-router";

export default {
  setup() {
    const store = useStore();
    const router = useRouter();

    const errors = ref({});

    const form = reactive({
      email: "",
      password: "",
    });

    const login = () => {
      store
        .dispatch("login", form)
        .then(() => {
          router.replace({ name: "admin.posts" });
        })
        .catch((e) => {
          if (e.response.status === 422) {
            errors.value = e.response.data.errors;
          }
        });
    };

    return {
      login,
      form,
      errors,
    };
  },
};
</script>