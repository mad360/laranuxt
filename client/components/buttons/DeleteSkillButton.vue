<template>
  <push-button size="xs" @click="$emit('deleteSkill')">
    <span
      class="w-1 h-4"
    />
    Delete
  </push-button>
</template>



<script>
  export default {
    emits: ['deleteSkill']
  }
</script>