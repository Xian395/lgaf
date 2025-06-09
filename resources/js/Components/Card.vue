<template>
  <div 
    :class="[
      'bg-white dark:bg-gray-800 overflow-hidden shadow-sm',
      rounded ? 'sm:rounded-lg' : '',
      padding ? 'p-6' : '',
      customClass
    ]"
  >
    <!-- Header slot for titles, actions, etc. -->
    <div v-if="$slots.header" class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
      <slot name="header"></slot>
    </div>

    <!-- Main content -->
    <div :class="['text-gray-900 dark:text-gray-100', contentClass]">
      <slot></slot>
    </div>

    <!-- Footer slot for actions, buttons, etc. -->
    <div v-if="$slots.footer" class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
      <slot name="footer"></slot>
    </div>
  </div>
</template>

<script setup>
// Props for customization
defineProps({
  // Whether to apply rounded corners (default: true)
  rounded: {
    type: Boolean,
    default: true
  },
  // Whether to apply default padding (default: true)
  padding: {
    type: Boolean,
    default: true
  },
  // Additional custom classes for the card wrapper
  customClass: {
    type: String,
    default: ''
  },
  // Additional classes for the content area
  contentClass: {
    type: String,
    default: ''
  }
})

// Define available slots
defineSlots()
</script>