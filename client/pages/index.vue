<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <div class="m-8 flex items-center justify-center text-4xl">
      Matthew DiPaolo Interview Project
    </div>
    <div class="m-8 flex items-center justify-center text-lg">
      As a developer, I am best described as multifaceted. Computer engineering, my professional experience, and my 
      personal endeavors have afforded me knowledge in a variety
      of technologies, ranging from PCB design, embeddeded systems development, high-performance computing in C, data structures
      and algorithms, object-oriented design in Java and C++, and web development using AWS, Node.js, express.js, and more.
      I believe it is the holistic view of computer technology that makes me valuable to Rimsys. I am flexible and able to tackle
      any problem that Rimsys may face. I can help or lead an effort in creating an intuitive user experience, 
      a robust back-end application, and a reliable server infrastructure. Most importantly, however, I am passionate about 
      web development and Rimsys' mission to helping businesses bring life-changing technology to market. 
    </div>
    <div class="flex justify-center">
      <ExperiencesColumn />
      <SkillsColumn />
    </div>
    <div class="text-center mt-4">
      <div class="mb-4">
        <push-button @click="error" class="">
          <icon icon="mdi:error" class="w-6 h-6 text-red-600 mr-2.5" />
          Force PHP Error
        </push-button>
      </div>
      <span>provided by endpoint</span><span>&nbsp;</span>
      <a
        class="text-blue-400"
        :href="`${$axios.defaults.baseURL}/example?count=9`"
        >/example</a
      >
      <span>&nbsp;</span>
      <span class="text-sm">(2 second delay)</span>
    </div>
    <div class="text-center mx-auto mt-4">
      <span class="mr-4">nuxt-tailvue kitchen sink:</span>
      <div class="mt-2 flex mx-auto">
        <n-link to="/modal">
          <push-button theme="whiteLeft" class="-mr-px">
            Modal
          </push-button>
        </n-link>
        <n-link to="/toast">
          <push-button theme="whiteMid">
            toasts
          </push-button>
        </n-link>
        <n-link to="/button">
          <push-button theme="whiteMid">
            buttons
          </push-button>
        </n-link>
        <n-link to="/icon">
          <push-button theme="whiteRight">
            icons
          </push-button>
        </n-link>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
const ctx = useContext();
const users = ref([] as models.Users);
const count = ref(9);
onMounted(() => get(count.value));
async function get(count: number): Promise<void> {
  await ctx.$sleep(2000);
  users.value = (
    await ctx.$axios.get("example", { params: { count } })
  ).data.data;
}
async function error(): Promise<void> {
  await ctx.$axios.get("/error");
}
</script>

<script lang="ts">
export default { auth: false };
</script>
