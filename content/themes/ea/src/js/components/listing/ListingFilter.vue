<template>
  <li class="listing-filter__item">
    <h4
      class="listing-filter__title"
      v-html="filterTitle"
    />
    <listing-terms
      :filter="config.taxonomy"
      :terms="config.terms"
      @filterSelected="handleClick()"
    />
  </li>
</template>

<script>
  import ListingTerms from './ListingTerms.vue'

  export default {
    name: 'ListingFilter',

    components: {
      ListingTerms
    },

    props: {
      config: {
        type: Object,
        default: () => {}
      }
    },

    computed: {
      filterTitle() {
        console.log(this.$t('filters')[this.config.label.toLowerCase()]);
        return this.$t('filters')[this.config.label.toLowerCase()]
      }
    }
  }
</script>
