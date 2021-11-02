<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <div>Experiences</div>
    <ul
      class="
        grid grid-cols-1
        gap-6
        bg-gray-100
        dark:bg-gray-900
        rounded
        p-8
        w-full
      "
    >
      <experience-card
        v-on:deleteExperience="deleteExperience"
        v-for="(experience, index) in experiences"
        :experience="experience"
        :key="index"
      />
    </ul>
    <div><AddExperienceButton v-on:addExperience='addExperience' /></div>
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

async function deleteExperience(){
  console.log("column delete experience - calling get()" )
  get()
}

async function addExperience(){
  console.log("column add experience -calling add experience modal" )
  //call add experience modal
}

</script>

<script lang="ts">
export default { auth: false };
</script>
