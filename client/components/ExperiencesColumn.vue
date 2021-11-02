<template>
  <div class="container p-2 lg:p-8 flex flex-col">
  <div>Experiences</div>
    <ul class="grid grid-cols-1 gap-6 bg-gray-100 dark:bg-gray-900 rounded p-8 w-full">
      <experience-card v-on:deleteExperience="deleteExperience" v-for="(experience, index) in experiences" :experience="experience" :key="index"/>
    </ul>
    <div><AddExperienceButton v-on:addExperience="addExperience"/></div>
    <modal-base v-if="modal" ref="modal" :destroyed="off">
      <div>
      Experience title:
      <input v-model="title" title="title" placeholder="title"/>
      </div>
      <div>
      Experience Description:
      <input v-model="description" title="skill description" placeholder="description">
      </div>
      <div>
      <push-button @click="inputSkill">Add Experience</push-button>
      </div>
    </modal-base>
  </div>
</template>




<script lang="ts" setup>
const ctx = useContext()
const experiences = ref([] as models.Experience)
const modal = ref(false)
const title = ref('')
const description = ref('')
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
  console.log("add Experience - deploy modal")
  modal.value = true
}
async function inputSkill(){
  console.log(" inputted experience:")
  console.log(title.value)
  console.log(description.value)
  await ctx.$axios.post("experiences",{title: title.value, description: description.value})
  await get()
  modal.value = false
}
function off (): void {
  modal.value = false
}
</script>
</script>

<script lang="ts">export default { auth: false }</script>