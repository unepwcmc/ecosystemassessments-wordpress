<template>
  <div class="listing-filter__drawer">
    <drawer
      name="filter"
      label="Filters"
      side="left"
    >
      <listing-filters
        :filters="filters"
      />
    </drawer>
    <drawer-trigger
      class="listing-filter__drawer-toggle"
      controls="filter"
      drawer="filter"
      label="Filter Toggle"
      v-if="filters.length"
    >
      Filter
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.442 25.082">
        <path data-name="Path 120" d="M29.867 18.83h-5a4.716 4.716 0 00-8.867 0H1.572a1.572 1.572 0 100 3.144h14.432a4.716 4.716 0 008.867 0h5a1.572 1.572 0 100-3.144zm-9.43 3.144a1.572 1.572 0 111.572-1.572 1.572 1.572 0 01-1.572 1.572zM1.572 6.253h5a4.716 4.716 0 008.867 0h14.428a1.572 1.572 0 100-3.144H15.438a4.716 4.716 0 00-8.867 0h-5a1.572 1.572 0 100 3.144zm9.432-3.144a1.572 1.572 0 11-1.572 1.572 1.572 1.572 0 011.573-1.572z" fill="#fff" />
      </svg>
    </drawer-trigger>
  </div>
</template>

<script>
  import Drawer from '../drawers/Drawer.vue'
  import DrawerTrigger from '../drawers/DrawerTrigger.vue'

  import ListingFilters from './ListingFilters.vue'

  export default {
    name: 'ListingDrawer',

    components: {
      Drawer,
      DrawerTrigger,
      ListingFilters
    },

    props: {
      filters: {
        type: Array,
        required: true
      }
    },

    methods: {
      clickHandler(id) {
        // this.$emit('filterSelected', id)
        console.log('You clicked an item with id of: ', id)
      }
    }
  }
</script>
