<template>
  <div class="container p-2 lg:p-8 flex flex-col">
  <div>Experiences</div>
    <ul class="grid grid-cols-1 gap-6 bg-gray-100 dark:bg-gray-900 rounded p-8 w-full">
      <experience-card v-for="(experience, index) in experiences" :experience="experience" :key="index"/>
    </ul>
    <div><AddExperienceButton /></div>
  </div>
</template>




<script lang="ts" setup>
const ctx = useContext()
const experiences = ref([] as models.Experience)
onMounted(() => get())
async function get () {
  await ctx.$sleep(2000)
  experiences.value = (await ctx.$axios.get('experiences'))
  experiences.value = experiences.value.data
}
async function error (): Promise<void> {
  await ctx.$axios.get('/error')
}
</script>

<script lang="ts">export default { auth: false }</script>