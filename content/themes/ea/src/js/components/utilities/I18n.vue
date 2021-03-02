<script>
export default {
  functional: true,

  props: {
    // currentLocale: {
    //   type: String,
    //   required: true
    // },
    // translations: {
    //   type: Array,
    //   required: true
    // }

    fallbackLocale: {
      required: true,
      type: String
    },
    locale: {
      required: true,
      type: String
    },
    messages: {
      required: true,
      type: Object
     }
  },

  render (createElement, { parent, props }) {
    // parent.$root.$emit('updateTranslations', {
    //   currentLocale: props.currentLocale,
    //   translations: props.translations
    // })
    parent.$i18n.setFallbackLocale = props.fallbackLocale
    parent.$i18n.locale = props.locale
    parent.$i18n.setLocaleMessage(props.locale, props.messages)
  }
}
</script>
