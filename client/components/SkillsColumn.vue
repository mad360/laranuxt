<template>
  <div class="container p-2 lg:p-8 flex flex-col">
  <div>Skills</div>
    <ul class="grid grid-cols-1 gap-6 bg-gray-100 dark:bg-gray-900 rounded p-8 w-full">
      <skill-card v-on:deleteSkill="deleteSkill" v-for="(skill, index) in skills" :skill="skill" :key="index" @skillCardChanged="get"/>
    </ul>
    <div><AddSkillButton /></div>
  </div>
</template>



<script lang="ts" setup>
import Vue from 'vue'
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
</script>

<script lang="ts">export default { auth: false }</script>