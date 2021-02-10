<template>
  <modal>
    <h3 class="lst-Modal_Title">{{ title }}</h3>
    <h4 class="lst-Modal_Heading" v-if="jobTitle">{{ jobTitle }}</h4>
    <div class="lst-Modal_Columns">
      <div class="lst-Modal_Column lst-Modal_Column--small" v-if="imageUrl">
        <div class="lst-Modal_ImageWrap" v-if="imageUrl">
          <img class="lst-Modal_Image" :src="imageUrl" :alt="title">
        </div>
        <ul class="lst-Modal_Items" v-if="email || twitterUrl">
          <li class="lst-Modal_Item">
            <a class="lst-Modal_Link" :href="`mailto:${ email }`">{{ email }}</a>
          </li>
          <li class="lst-Modal_Item">
            <a class="lst-Modal_Link" :href="`https://twitter.com/${ twitterUrl }`">
              <svg class="lst-Modal_SocialIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.12 20.41"><g data-name="Layer 2"><path d="M7.9 20.41A14.56 14.56 0 0022.56 5.75v-.67a10.36 10.36 0 002.57-2.67 10.17 10.17 0 01-3 .81 5.15 5.15 0 002.3-2.85 10.22 10.22 0 01-3.28 1.25 5.16 5.16 0 00-8.91 3.54 5 5 0 00.13 1.16A14.59 14.59 0 011.75.94a5.18 5.18 0 001.59 6.88A5.08 5.08 0 011 7.17v.07a5.18 5.18 0 004.14 5 5.1 5.1 0 01-2.33.09A5.19 5.19 0 007.63 16a10.39 10.39 0 01-6.4 2.21c-.41 0-.82 0-1.23-.07a14.65 14.65 0 007.9 2.31" fill="currentColor" data-name="Layer 1"/></g></svg>
              Twitter
            </a>
          </li>
        </ul>
      </div>
      <div class="lst-Modal_Column lst-Modal_Column--large">
        <div class="lst-Modal_Content rte-RichText" v-if="content" v-html="content" />
      </div>
    </div>
  </modal>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import Modal from '../modal/Modal.vue'

  export default {
    name: 'ListingModal',

    components: {
      Modal
    },

    props: {
      config: {
        type: Object,
        default: () => {}
      }
    },

    computed: {
      content() {
        return this.config.content ? this.config.content.rendered : ''
      },

      email() {
        return this.config.ACF.email ? this.config.ACF.email : ''
      },

      imageUrl() {
        return this.config._embedded ? this.config._embedded['wp:featuredmedia'][0].source_url : ''
      },

      jobTitle() {
        return this.config.ACF.job_title ? this.config.ACF.job_title : ''
      },

      title() {
        return this.config.title ? decodeString(this.config.title.rendered) : ''
      },

      twitterUrl() {
        return this.config.ACF.twitter_account ? this.config.ACF.twitter_account : ''
      }
    }
  }
</script>
