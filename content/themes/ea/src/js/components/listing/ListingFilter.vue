<template>
  <li class="lst-Filter_Item">
    <h4 class="lst-Filter_Title">{{ config.label }}</h4>
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
    }
  }
</script>
