<template>
  <div :class="['mod-Modal', { 'mod-Modal--active' : active }]">
    <div class="mod-Modal_Inner">

      <div class="mod-Modal_Body">
        <div class="mod-Modal_Close" v-on:click="closeModal">
          <span class="mod-Modal_CloseSpan"></span>
          <span class="mod-Modal_CloseSpan"></span>
        </div>

        <div class="mod-Modal_Content">
          <slot />
        </div>
      </div>

    </div>

    <div class="mod-Modal_Overlay" v-on:click="closeModal"></div>
  </div>
</template>

<script>
  export default {
    name: 'Modal',

    props: {
      config: {
        type: Object,
        default: () => {}
      }
    },

    data () {
      return {
        active: false,
        scrollbarWidth: 0,
        scrollTop: 0
      }
    },

    mounted() {
      this.$eventHub.$on('modal-open', this.openModal)
    },

    methods: {
      closeModal() {
        this.active = false
        this.toggleBodyClass('removeClass', 'lyt-Body--modalActive');
      },

      openModal() {
        this.active = true
        this.toggleBodyClass('addClass', 'lyt-Body--modalActive');
      },

      toggleBodyClass(addRemoveClass, className) {
        const body = document.body;

        if (addRemoveClass === 'addClass') {
          // When the modal is shown, we want a fixed body
          this.scrollTop = window.scrollY;
          this.scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
          body.classList.add(className);
          body.style.top = `-${this.scrollTop}px`;
          body.style.paddingRight = `${this.scrollbarWidth}px`;
        } else {
          // When the modal is hidden we want to go back to where we had scrolled
          body.classList.remove(className);
          body.style.top = 0;
          body.style.paddingRight = 0;
          window.scrollTo(0, parseInt(`-${this.scrollTop}px` || '0') * -1);
        }
      }
    }
  }
</script>
