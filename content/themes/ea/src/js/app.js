import Vue from 'vue'
import objectFitImages from 'object-fit-images'
import VueProgressiveImage from 'vue-progressive-image'

Vue.use(VueProgressiveImage)

Vue.config.productionTip = false

window.axios = require('axios')

import AddClassOnClick from './helpers/AddClassOnClick.vue'
import CaseStudiesGrid from './components/casestudies/CaseStudiesGrid.vue'
import Drawer from './components/drawers/Drawer.vue'
import DrawerTrigger from './components/drawers/DrawerTrigger.vue'
import DrawersOverlay from './components/drawers/DrawersOverlay.vue'
import LatestPosts from './components/widgets/LatestPosts.vue'
import ListingGrid from './components/listing/ListingGrid.vue'
import HeaderSearch from './components/header/HeaderSearch.vue'
import MainHeader from './components/header/MainHeader.vue'

window.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add('loaded')
  objectFitImages()

  if(document.getElementById('v-app')) {

    Vue.prototype.$eventHub = new Vue()

    new Vue({
      el: '#v-app',
      components: {
        AddClassOnClick,
        CaseStudiesGrid,
        Drawer,
        DrawerTrigger,
        DrawersOverlay,
        HeaderSearch,
        LatestPosts,
        ListingGrid,
        MainHeader
      },

      mounted() {
        document.querySelector('body').classList.add('layout__body--loaded')
      }
    })

  }
})
