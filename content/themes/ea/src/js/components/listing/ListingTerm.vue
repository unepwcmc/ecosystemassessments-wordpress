<template>
  <li class="lst-Filter_Term">
    <input class="lst-Filter_Checkbox" type="checkbox" :value="value" :checked="checked" @change="onChange($event.target.checked)" />
    <label class="lst-Filter_Label">{{ label }}</label>
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
