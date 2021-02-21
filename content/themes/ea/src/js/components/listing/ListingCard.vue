<template>
  <div class="crd-Listing_Card" @click="clickHandler()">
    <div class="crd-Listing_Header">
      <div class="crd-Listing_ImageWrap">
        <img class="crd-Listing_Image" :src="imageUrl" :alt="title">
      </div>
    </div>
    <div class="crd-Listing_Body">
      <p class="crd-Listing_Date" v-if="hasDate">{{ date }}</p>
      <h3 class="crd-Listing_Title">{{ title }}</h3>
    </div>
    <a :href="link" class="crd-Listing_FauxLink" :title="title" :target="hrefTarget" v-if="!modal"></a>
  </div>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import moment from 'moment'

  export default {
    name: 'ListingCard',

    props: {
      id: {
        type: Number,
        required: true
      },
      config: {
        type: Object,
        default: () => {}
      },
      modal: {
        type: Boolean,
        default: false
      },
      postType: {
        type: String,
        required: true
      }
    },

    data() {
      return {
        placeholderImageUrl: '/content/themes/ea/dist/img/card-placeholder.png'
      }
    },

    computed: {
      date() {
        if (this.postType === 'event') {
          return this.config.acf && moment(this.config.acf.date_start).format('D MMMM YYYY')
        } else {
          return this.config.ACF && this.config.ACF.date
            ? this.config.ACF.date
            : moment(this.config.date).format('D MMMM YYYY')
        }
      },

      imageUrl() {
        if (this.postType == 'casestudy') {
          return this.config.imageUrl
            ? this.config.imageUrl
            : this.placeholderImageUrl
        } else {
          return (
            this.config.hasOwnProperty('_embedded') &&
            this.config._embedded.hasOwnProperty('wp:featuredmedia')
          )
            ? this.config._embedded['wp:featuredmedia'][0].source_url
            : this.placeholderImageUrl
        }
      },

      link() {
        if (this.postType == 'member') {
          return this.config.ACF && this.config.ACF.url
            ? this.config.ACF.url
            : ''
        } else {
          return this.config.link
        }
      },

      hasDate() {
        return this.postType == 'post' || this.postType == 'event'
      },

      hrefTarget() {
        return (this.postType == 'member' || this.postType == 'casestudy') ? '_blank' : '_self'
      },

      title() {
        return this.config.title ? decodeString(this.config.title.rendered) : ''
      }
    },

    methods: {
      clickHandler () {
        if (this.modal) {
          this.$eventHub.$emit('modal-open')
          this.$parent.$emit('onCardClicked', this.id)
        }
      }
    }
  }
</script>
