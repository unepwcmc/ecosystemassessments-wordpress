<template>
  <modal>
    <h3 class="listing-modal__title">
      {{ title }}
    </h3>
    <h4
      class="listing-modal__heading"
      v-if="jobTitle"
    >
      {{ jobTitle }}
    </h4>
    <div class="listing-modal__columns">
      <div
        v-if="imageUrl"
        class="listing-modal__column listing-modal__column--small"
      >
        <div
          v-if="imageUrl"
          class="listing-modal__image-wrap"
        >
          <img
            class="listing-modal__image"
            :src="imageUrl"
            :alt="title"
          >
        </div>
        <ul
          class="listing-modal__items"
          v-if="email || twitterUrl"
        >
          <li class="listing-modal__item">
            <a
              class="listing-modal__link"
              :href="`mailto:${ email }`"
            >
              {{ email }}
            </a>
          </li>
          <li class="listing-modal__item">
            <a
              class="listing-modal__link"
              :href="`https://twitter.com/${ twitterUrl }`"
            >
              <IconTwitter class="listing-modal__social-icon" />
              {{ $t('social.twitter') }}
            </a>
          </li>
        </ul>
      </div>
      <div class="listing-modal__column listing-modal__column--large">
        <div
          v-if="content"
          v-html="content"
          class="listing-modal__content richtext"
        />
      </div>
    </div>
  </modal>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import IconTwitter from '../../icons/IconTwitter.vue'
  import Modal from '../modal/Modal.vue'

  export default {
    name: 'ListingModal',

    components: {
      IconTwitter,
      Modal
    },

    props: {
      post: {
        type: Object,
        default: () => {}
      }
    },

    computed: {
      content() {
        return this.post.content ? this.post.content.rendered : ''
      },

      email() {
        return this.post.ACF ? this.post.ACF.email : ''
      },

      imageUrl() {
        return this.post._embedded['wp:featuredmedia'] ? this.post._embedded['wp:featuredmedia'][0].source_url : ''
      },

      jobTitle() {
        return this.post.ACF ? this.post.ACF.job_title : ''
      },

      title() {
        return this.post.title ? decodeString(this.post.title.rendered) : ''
      },

      twitterUrl() {
        return this.post.ACF ? this.post.ACF.twitter_account : ''
      }
    }
  }
</script>
