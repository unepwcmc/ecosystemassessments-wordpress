<template>
  <ul class="listing-filter__terms">
    <li
      v-for="term in terms"
      class="listing-filter__term"
      :key="term.term_id"
    >
      <input
        class="listing-filter__checkbox"
        :id="term.term_id"
        type="checkbox"
        :value="term.term_id"
        v-model="checkedTerms"
      />
      <label
        class="listing-filter__label"
        :for="term.term_id"
        v-html="term.name"
      />
    </li>
  </ul>
</template>

<script>
  export default {
    name: 'ListingTerms',

    props: {
      filter: {
        type: String,
        default: ''
      },
      terms: {
        type: Array,
        default: () => []
      }
    },

    data() {
      return {
        checkedTerms: []
      }
    },

    watch: {
      checkedTerms: function () {
        this.$eventHub.$emit('termsUpdated', this.filter, this.checkedTerms)
      }
    }
  }
</script>
