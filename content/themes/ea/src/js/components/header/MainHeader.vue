<template>
  <div
    class="header"
    :class="{ 'header--scrolled': scrolled }"
    ref="header"
  >
    <div class="header__inner">
      <div class="header__body">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import { debounce } from 'throttle-debounce'

export default {
  name: "main-header",

  data() {
    return {
      headerHeight: 0,
      scrolled: false
    }
  },

  created () {
    window.addEventListener('scroll', this.headerScroll);
  },

  mounted () {
    this.getHeaderHeight()
  },

  destroyed () {
    window.removeEventListener('scroll', this.headerScroll);
  },

  methods: {
    getHeaderHeight() {
      this.headerHeight = this.$refs.header.clientHeight
    },

    headerScroll: debounce(250, function() {
      this.scrolled = document.documentElement.scrollTop > this.headerHeight
    })
  }
}
</script>
