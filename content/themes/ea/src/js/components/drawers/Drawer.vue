<template>
  <div :class="['drw-Drawer', drawerSideClass, { 'drw-Drawer--active' : isActive }]" :data-drawer="name">
   <div class="drw-Drawer_Inner">
     <div class="drw-Drawer_Header">
       <button class="drw-Drawer_Close" aria-label="Close" @click="closeDrawer">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.799 25.799">
           <g data-name="Group 73" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="3">
             <path data-name="Line 106" d="M1.061 1.061l23.677 23.677"/>
             <path data-name="Line 107" d="M24.738 1.061L1.061 24.738"/>
           </g>
         </svg>
       </button>
       <h3 class="drw-Drawer_Title" v-if="label">{{ label }}</h3>
     </div>
     <div class="drw-Drawer_Body">
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
        return 'drw-Drawer--' + this.side;
      }
    },

    methods: {
      closeDrawer() {
        this.isActive = false
        document.body.classList.remove('utl-DrawerActive')
      },
      openDrawer() {
        this.isActive = true
        document.body.classList.add('utl-DrawerActive')
      }
    }
  }
</script>
