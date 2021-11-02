<template>
  <push-button size="xs" @click="$emit('addExperience')">
    <span
      class="w-1 h-4"
    />
    Add Experience 
  </push-button>
</template>

<script >
  export default {
    emits: ['addExperience']
  }
</script>