<template>
  <div :class="['header-search', { 'header-search--bar-active' : active }]">
    <button class="header-search__toggle" aria-label="Search Button" @click="handleClick">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
    </button>
    <div class="header-search__bar">
      <form class="header-search__form" role="search" method="get" id="searchform" :action="formAction">
        <label for="s" class="utility__screen-reader-only">Search for:</label>

        <input type="text" name="s" id="s" value="" class="header-search__input" placeholder="Search here">

        <input type="submit" name="" value="Search" class="header-search__button">
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeaderSearch',

  props: {
    formAction: {
      type: String,
      default: ''
    }
  },

  data() {
    return {
      active: false
    }
  },

  methods: {
    handleClick() {
      this.active = !this.active
    }
  }
}
</script>
