<template>
  <div class="container p-2 lg:p-8 flex flex-col">
  <div>Skills</div>
    <ul class="grid grid-cols-1 gap-6 bg-gray-100 dark:bg-gray-900 rounded p-8 w-full">
      <skill-card v-on:deleteSkill="deleteSkill" v-for="(skill, index) in skills" :skill="skill" :key="index" @skillCardChanged="get"/>
    </ul>
    <div><AddSkillButton v-on:addSkill="addSkill" /></div>
    <modal-base v-if="modal" ref="modal" :destroyed="off">
      <div>
      Skill title:
      <input v-model="title" title="title" placeholder="title"/>
      </div>
      <div>
      Skill Description:
      <input v-model="description" title="skill description" placeholder="description">
      </div>
      <div>
      <push-button @click="inputSkill">Add Skill</push-button>
      </div>
    </modal-base>
  </div>
</template>



<script lang="ts" setup>
import Vue from 'vue'
const modal = ref(false)
const title = ref('')
const description = ref('')
const ctx = useContext()
const skills = ref([] as models.Skill)
onMounted(() => get())
async function get () {
  await ctx.$sleep(2000)
  skills.value = (await ctx.$axios.get('skills'))
  skills.value = skills.value.data
  console.log(skills.value)
  console.log("get")
}
async function error (): Promise<void> {
  await ctx.$axios.get('/error')
}

async function deleteSkill(){
  console.log("column delete skill - calling get()" )
  get()
}
async function addSkill(){
  console.log("add skill - deploy modal")
  modal.value = true
  //show modal
}
async function inputSkill(){
  console.log("skill inputted:")
  console.log(title.value)
  console.log(description.value)
  let input = [{title: title.value, description: description.value}]
  console.log(input)
  await ctx.$axios.post("skills",{title: title.value, description: description.value})
  await get()
  modal.value = false
}
function off (): void {
  modal.value = false
}
</script>

<script lang="ts">export default { auth: false }</script>