<template>
  <li class="listing-filter__term">
    <input class="listing-filter__checkbox" type="checkbox" :value="value" :checked="checked" @change="onChange($event.target.checked)" />
    <label
      class="listing-filter__label"
      v-html="label"
    />
  </li>
</template>

<script>
  export default {
    name: 'ListingTerm',

    model: {
      prop: 'checked',
      event: 'change'
    },

    props: {
      checked: {
        type: Boolean,
        default: false
      },
      label: {
        type: String,
        default: ''
      },
      value: {
        type: Number,
        default: 0
      }
    },

    methods: {
      onChange(value) {
        this.$emit('change', value)
      }
    }
  }
</script>
