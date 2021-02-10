<template>
  <ul class="lst-Filter_Terms">
    <li
      v-for="term in terms"
      class="lst-Filter_Term"
      :key="term.term_id"
    >
      <input
        class="lst-Filter_Checkbox"
        :id="term.term_id"
        type="checkbox"
        :value="term.term_id"
        v-model="checkedTerms"
      />
      <label
        class="lst-Filter_Label"
        :for="term.term_id"
      >
        {{ term.name }}
      </label>
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
