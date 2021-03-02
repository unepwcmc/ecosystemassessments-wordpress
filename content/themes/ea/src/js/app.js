import Vue from 'vue'
import VueI18n from 'vue-i18n'
import objectFitImages from 'object-fit-images'
import VueProgressiveImage from 'vue-progressive-image'

Vue.use(VueI18n)

Vue.use(VueProgressiveImage)

Vue.config.productionTip = false

window.axios = require('axios')

import AddClassOnClick from './helpers/AddClassOnClick.vue'
import Drawer from './components/drawers/Drawer.vue'
import DrawerTrigger from './components/drawers/DrawerTrigger.vue'
import DrawersOverlay from './components/drawers/DrawersOverlay.vue'
import LatestPosts from './components/widgets/LatestPosts.vue'
import ListingGrid from './components/listing/ListingGrid.vue'
import HeaderSearch from './components/header/HeaderSearch.vue'
import MainHeader from './components/header/MainHeader.vue'
import I18n from './components/utilities/I18n.vue'

// [
//    {
//       "string_id":"1483",
//       "string_language":"en",
//       "string_package_id":null,
//       "context":"wcmc",
//       "gettext_context":"",
//       "name":"83d20267ca55a19b188f8d734e4c77e2",
//       "value":"Vue Text To Translate",
//       "status":"2",
//       "translation_priority":"optional",
//       "translations":{
//          "de":{
//             "id":"12",
//             "language":"de",
//             "status":"10",
//             "value":"Vue Text zu übersetzen",
//             "mo_string":null,
//             "translator_id":null,
//             "translation_date":"2021-03-02 11:37:59",
//             "in_basket":false
//          }
//       }
//    }
// ]

// Vue.prototype.$t = function (defaultTranslation) {
//   const baseTranslation = this.$root.translations.find((translationObject) => translationObject.value === defaultTranslation)
//   if (!baseTranslation) {
//     return defaultTranslation
//   }
//   if (this.$root.currentLocale === baseTranslation.string_language) {
//     return baseTranslation.value
//   }
//   const localeSpecificTranslation = baseTranslation.translations[this.$root.currentLocale]
//   return localeSpecificTranslation ? localeSpecificTranslation.value : baseTranslation.value
// }


window.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add('loaded')
  objectFitImages()

  if(document.getElementById('v-app')) {

    // TODO: Change to $root, delete below line
    Vue.prototype.$eventHub = new Vue()

    new Vue({
      el: '#v-app',
      components: {
        AddClassOnClick,
        Drawer,
        DrawerTrigger,
        DrawersOverlay,
        HeaderSearch,
        LatestPosts,
        ListingGrid,
        MainHeader,
        I18n
      },

      i18n: new VueI18n({ silentTranslationWarn: true }),

      data () {
        return {
          // currentLocale: undefined,
          translations: undefined
        }
      },

      created () {
        // this.$root.$on('updateTranslations', ({ currentLocale, translations }) => {
        //   this.currentLocale = currentLocale
        //   this.translations = translations
        // })
        this.translations = window.vue_translations
      },

      mounted() {
        document.querySelector('body').classList.add('layout__body--loaded')
        console.log('vue_translations: ', vue_translations)
      }
    })

  }
})
