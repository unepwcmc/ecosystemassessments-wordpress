<template>
  <div class="drw-Drawers_Overlay" @click="clickHandler"></div>
</template>

<script>
export default {
  name: 'DrawersOverlay',

  methods: {
    clickHandler () {
       this.$eventHub.$emit('drawerClosed');
    }
  }
}
</script>
