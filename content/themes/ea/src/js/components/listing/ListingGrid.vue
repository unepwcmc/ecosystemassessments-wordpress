<template>
  <div :class="['lst-Listing', `lst-Listing--${postType}`]" v-if="!isLoading">
    <div class="lst-Listing_Header">
      <p class="lst-Listing_Count" v-if="!isFetching">Showing {{ posts.length }} of {{ maxPosts }} entries</p>

      <listing-drawer
        :filters="filters"
        @filterSelected="onFilterSelected()"
        v-if="filters.length"
      />
    </div>

    <div class="lst-Listing_Body">
      <div class="lst-Listing_Content" v-if="posts.length">
        <listing-cards
        :modal="this.modal"
        :posts="posts"
        :post-type="postSingular"
        @onCardClicked="updateActivePost"
        />

        <observer v-on:intersect="intersected" />
      </div>

      <div class="lst-Listing_Content lst-Listing_Content--empty" v-else>
        <p class="lst-Listing_EmptyMessage" v-if="!isFetching">No results found.</p>
      </div>

      <div
        class="lst-Listing_Loader"
        v-if="isFetching"
      >
        <loader />
      </div>

      <listing-modal
        :config="activePost"
        v-if="modal"
      />
    </div>
  </div>

  <div class="lst-Listing_Loader lst-Listing_Loader--padded" v-else>
    <loader />
  </div>
</template>

<script>
import ListingCards from './ListingCards.vue'
import ListingDrawer from './ListingDrawer.vue'
import ListingModal from '../listing/ListingModal.vue'
import Loader from '../utilities/Loader.vue'
import Observer from '../utilities/Observer.vue'

export default {
  name: 'ListingGrid',

  components: {
    ListingCards,
    ListingDrawer,
    ListingModal,
    Loader,
    Observer
  },

  props: {
    postType: {
      type: String,
      required: true
    },
    modal: {
      type: Boolean,
      default: false
    }
  },

  created() {
    this.postSingular = this.postType === 'posts' ? 'post' : this.postType
  },

  mounted() {
    this.getPosts()
    this.getFilters()

    this.$eventHub.$on('termsUpdated', (filter, checkedTerms) => {
      this.$set(this.activeTerms, filter, checkedTerms)
    })
  },

  data() {
    return {
      activePost: {},
      activeTerms: {},
      config: {
        postsBaseUrl: '/wp-json/wp/v2/',
        eventsBaseUrl: '/wp-json/urban-alliance/v1/events?_embed',
        filtersBaseURL: '/wp-json/urban-alliance/v1/list-filters'
      },
      filters: [],
      isLoading: true,
      isFetching: false,
      maxPosts: 1,
      page: 1,
      perPage: 8,
      posts: [],
      postSingular: ''
    }
  },

  computed: {
    filtersURL() {
      let requestURL = this.config.filtersBaseURL + '?post_type=' + this.postSingular

      return encodeURI(requestURL)
    },

    postsParams() {
      let params = {
        'page': this.page,
        'per_page': this.perPage
      }

      Object.keys(this.activeTerms).forEach(term => {
        if (this.activeTerms[term].length > 0) {
          params[term] = this.activeTerms[term].join()
        } else {
          delete params[term]
        }
      });

      return params
    }
  },

  watch: {
    activeTerms: {
      handler() {
        this.posts = []
        this.maxPosts = 1
        this.page = 1;
        console.log('postsParams: ', this.postsParams);
        this.getPosts()
      },
      deep: true
    }
  },

  methods: {
    getFilters() {
      axios.get(this.filtersURL)
      .then((response) => {
        this.filters = this.getFiltersWithTerms(response.data.filters);
      })
      .catch((error) => {
        console.error(error)
      })
    },

    getFiltersWithTerms(filters) {
      return filters.filter(filter => {
        // check if filter has any terms
        if (filter.terms.length) {
          // Loop through all terms
          const newTerms = filter.terms.filter(term => {
            // Return if term is assigned to at least 1 post
            return term.count
          })

          // If filter has more than 1 term
          if (newTerms.length) {
            // Create copy of term
            const newFilter = filter
            // Update terms with emptys removed
            newFilter.terms = newTerms
            // Return new filter
            return newFilter
          }
        }
      })
    },

    getPosts() {
      if (!this.isFetching && ((this.posts.length < this.maxPosts) || this.isLoading)) {
        this.isFetching = true

        axios.get(this.getPostsURL(), { params: this.postsParams })
        .then((response) => {
          this.maxPosts = parseInt(response.headers['x-wp-total'])
          this.totalPostCount = this.maxPosts
          this.page += 1
          this.posts.push(...response.data)
          this.activePost = this.posts[0]
          this.isFetching = false
          this.isLoading = false
        })
        .catch((error) => {
          console.error(error)
          this.isFetching = false
          this.isLoading = false
        })
      }
    },

    getPostsURL() {
      let requestURL = this.postType == 'event'
        ? this.config.eventsBaseUrl
        : this.config.postsBaseUrl + this.postType + '?_embed'

      return encodeURI(requestURL)
    },

    intersected() {
      this.getPosts()
    },

    updateActivePost(id) {
      this.activePost = this.posts[id];
    }
  }
}
</script>
