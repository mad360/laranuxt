<template>
  <push-button size="xs" @click="mode">
    <span
      class="w-1 h-4"
    />
    Delete
  </push-button>
</template>

<script setup lang="ts">
import TopNavbar from "@/layout/TopNavbar.vue";
import { defineProps, reactive } from "vue";
const props = defineProps({
  id: Number,
});

function mode(){
  console.log(props.id)
}


</script>