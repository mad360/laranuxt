<template>
  <push-button size="xs" @click="$emit('deleteExperience')">
    <span
      class="w-1 h-4"
    />
    Delete
  </push-button>
</template>

<script>
  export default {
    emits: ['deleteExperience']
  }
</script>