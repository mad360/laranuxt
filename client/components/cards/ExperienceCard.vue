
<template>
  <li class="w-max col-span-1 bg-white dark:bg-gray-700 rounded-lg shadow">
    <div class="w-5/6 h-auto flex items-center justify-between p-6 space-x-6">
      <div class="flex-1/2 truncate">
        <div class="flex items-center space-x-3">
          <h3 class="text-gray-900 dark:text-gray-200 text-sm leading-5 font-medium truncate">
            {{ experience.title }}
          </h3>
        </div>
        <div class="break-nomral w-72 h-auto break-normal mt-1 text-gray-500 dark:text-gray-400 text-sm leading-5">
        <p class="break-normal">
          {{experience.description}}
        </p>
        </div>
      </div>
        <ul class="grid grid-cols-1 ">
            <li><DeleteExperienceButton v-on:deleteExperience="deleteExperience(experience)"/> </li>
            <li><UpdateExperienceButton /> </li>
        </ul>
    </div>
  </li>
</template>

<script setup lang="ts">
const props = defineProps({
  experience: Object,
});
const emit = defineEmits(['deleteExperience'])
const ctx = useContext()

async function deleteExperience(card: any){
  console.log("card - making database delete query")
  console.log(card.id)
  await ctx.$axios.delete("experiences/" + card.id)
  console.log("card - made delete query")
  emit('deleteExperience')
}
</script>