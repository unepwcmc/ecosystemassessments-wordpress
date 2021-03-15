<template>
  <div
    class="card-listing__card"
    :class="`card-listing__card--${postType}`"
    @click="clickHandler()"
  >
    <div
      v-if="!isResource"
      class="card-listing__header"
    >
      <div class="card-listing__image-wrap">
        <img
          class="card-listing__image"
          :src="imageUrl"
          :alt="title"
        >
      </div>
    </div>
    <div class="card-listing__body">
      <p
        v-if="hasDate"
        class="card-listing__date"
      >
        {{ date }}
      </p>
      <ul
        v-if="isResource"
        class="card-listing__details-items"
      >
        <li
          v-if="resourceType"
          class="card-listing__details-item"
        >
          {{ $t(`resources.${resourceType}`) }}
        </li>
        <li class="card-listing__details-item">
          {{ $t('resources.resource') }}
        </li>
      </ul>
      <h3 class="card-listing__title">
        {{ title }}
      </h3>
    </div>
    <a
      v-if="!modal"
      :href="link"
      class="card-listing__fauxlink"
      :title="title"
      :target="hrefTarget"
    ></a>
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

      isResource() {
        return this.postType === 'resource'
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

      resourceStage() {
        return (this.postType == 'resource' && this.config._embedded['wp:term'].find(term => term[0].taxonomy == 'resource_stage')) ?
          this.config._embedded['wp:term'].find(term => term[0].taxonomy == 'resource_stage')[0].slug :
          undefined
      },

      resourceType() {
        return (this.postType == 'resource' && this.config._embedded['wp:term'].find(term => term[0].taxonomy == 'resource_type')) ?
          this.config._embedded['wp:term'].find(term => term[0].taxonomy == 'resource_type')[0].slug :
          undefined
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
