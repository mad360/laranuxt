<template>
  <push-button size="xs" @click="$emit('addSkill')">
    <span
      class="w-1 h-4"
    />
    Add Skill 
  </push-button>
</template>

<script >
  export default {
    emits: ['addSkill']
  }
</script>