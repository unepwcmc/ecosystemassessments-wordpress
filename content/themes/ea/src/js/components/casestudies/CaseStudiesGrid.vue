<template>
  <div :class="['listing', `listing--${postType}`]" v-if="!isLoading">
    <div class="listing__header">
      <p class="listing__count" v-if="!isFetching">Showing {{ posts.length }} of {{ maxPosts }} entries</p>
    </div>

    <div class="listing__body">
      <div class="listing__content" v-if="posts.length">
        <listing-cards
          :posts="posts"
          :post-type="postSingular"
        />

        <observer v-on:intersect="intersected" />
      </div>

      <div class="listing__content listing__content--empty" v-else>
        <p class="listing___empty-message" v-if="!isFetching">No results found.</p>
      </div>

      <div
        class="listing__loader"
        v-if="isFetching"
      >
        <loader />
      </div>
    </div>
  </div>

  <div class="listing__loader listing__loader--padded" v-else>
    <loader />
  </div>
</template>

<script>
import ListingCards from '../listing/ListingCards.vue'
import Loader from '../utilities/Loader.vue'
import Observer from '../utilities/Observer.vue'

export default {
  name: 'CaseStudiesGrid',

  components: {
    ListingCards,
    Loader,
    Observer
  },

  mounted() {
    this.getPosts()
  },

  data() {
    return {
      activePost: {},
      activeTerms: {},
      config: {
        postsBaseUrl: 'https://panorama.solutions/en/api/v1/solutions'
      },
      filters: [],
      isLoading: true,
      isFetching: false,
      maxPosts: 1,
      page: 1,
      perPage: 8,
      posts: [],
      postSingular: 'casestudy',
      postType: 'casestudy'
    }
  },

  computed: {
    postsURL() {
      let requestURL = this.config.postsBaseUrl

      return encodeURI(requestURL)
    },
    postsParams() {
      let params = {
        'page': this.page,
        'api_key': process.env.PANORAMA_API,
        'portal_title': 'sustainable-urban-development-and-resilience',
        'i': '57e1b682',
        'c': `vLaAd8QTLB2ZRbc6g-lJMDk1-B93aIZVcfVSJxSbaUrVsh4tehw_5ZGV8LuUfROtp5jtfFAHuKFkombZRj1qwk0NtfvbJeIvaKWpeTQ17RncZbUkjRRiKCL_uLXqI83l-zd-_9KQQiz3QiHRvPLOgm8yp1tYAhPBBTTrS5wCNHVq0DEuWDvB843xBmuc1iHxFpcALldpxZEKIxIt8fujLdiQ3YXqhTQ1MNdinuZaTiVTbKwIcQn2CW6rKbGY1IkRnKLLJUwXd1qxMwxUGlVegw[${process.env.PANORAMA_API}]`
      }

      return params
    }
  },

  methods: {
    getPosts() {
      if (!this.isFetching && ((this.posts.length < this.maxPosts) || this.isLoading)) {
        this.isFetching = true

        axios.get(this.postsURL, { params: this.postsParams })
        .then((response) => {
          this.maxPosts = response.data.pager.count
          this.page += 1

          response.data.solutions.forEach(solution => {
            this.posts.push({
              imageUrl: solution.solution.preview_image.src,
              link: solution.solution.url,
              title: {
                rendered: solution.solution.title
              }
            })
          })

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

    intersected() {
      this.getPosts()
    }
  }
}
</script>
