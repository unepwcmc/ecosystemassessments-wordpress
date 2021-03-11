<template>
  <ul class="listing-filter__terms">
    <li
      v-for="term in terms"
      :key="term.term_id"
      class="listing-filter__term"
    >
      <input
        :id="term.term_id"
        type="checkbox"
        :value="term.term_id"
        v-model="checkedTerms"
        class="listing-filter__checkbox"
      />
      <label
        :for="term.term_id"
        v-html="term.name"
        class="listing-filter__label"
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
