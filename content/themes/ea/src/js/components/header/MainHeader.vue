<template>
  <div :class="['hd-Header', { 'hd-Header--scrolled' : scrolled }]" ref="header">
    <div class="hd-Header_Inner">
      <div class="hd-Header_Body">
        <slot></slot>
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
