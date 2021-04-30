<template>
  <div
    class="layout-header"
    :class="{ 'layout-header--scrolled': scrolled }"
  >
    <slot />
  </div>
</template>

<script>
import { debounce } from 'throttle-debounce'

export default {
  name: "main-header",

  data() {
    return {
      distanceToTrigger: 1,
      scrolled: false
    }
  },

  created () {
    window.addEventListener('scroll', this.headerScroll);
  },

  destroyed () {
    window.removeEventListener('scroll', this.headerScroll);
  },

  methods: {
    headerScroll: debounce(0, function() {
      this.scrolled = document.documentElement.scrollTop > this.distanceToTrigger
    })
  }
}
</script>
