<template>
  <div :class="['drawer', drawerSideClass, { 'drawer--active' : isActive }]" :data-drawer="name">
   <div class="drawer__inner">
     <div class="drawer__header">
       <button class="drawer__close" aria-label="Close" @click="closeDrawer">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.799 25.799">
           <g data-name="Group 73" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="3">
             <path data-name="Line 106" d="M1.061 1.061l23.677 23.677"/>
             <path data-name="Line 107" d="M24.738 1.061L1.061 24.738"/>
           </g>
         </svg>
       </button>
       <h3 class="drawer__title" v-if="label">{{ label }}</h3>
     </div>
     <div class="drawer__body">
       <slot />
     </div>
   </div>
  </div>
</template>

<script>
  export default {
    name: 'Drawer',

    props: {
      name: {
        type: String,
        default: ''
      },
      label: {
        type: String,
        default: ''
      },
      side: {
        type: String,
        default: 'right'
      }
    },

    mounted () {
      this.$eventHub.$on('drawerOpened', value => {
        console.log('Open drawer');
        if (this.name == value) {
          this.openDrawer()
        }
      })
      this.$eventHub.$on('drawerClosed', value => {
        this.closeDrawer()
      })
    },

    data() {
      return {
        isActive: false
      }
    },

    computed: {
      drawerSideClass() {
        return 'drawer--' + this.side;
      }
    },

    methods: {
      closeDrawer() {
        this.isActive = false
        document.body.classList.remove('utility__drawer-active')
      },
      openDrawer() {
        this.isActive = true
        document.body.classList.add('utility__drawer-active')
      }
    }
  }
</script>
