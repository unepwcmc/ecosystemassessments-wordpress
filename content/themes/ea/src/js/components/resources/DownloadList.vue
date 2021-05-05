<template>
  <div class="res-Downloads">
    <div class="res-Downloads_InputGroup">
      <label
        v-if="label"
        for="refine"
        class="res-Downloads_Label"
      >
        {{ label }}:
      </label>
      <select
        name="downloadsSelect"
        id="downloadsSelect"
        v-model="selectedOption"
        @change="getCurrentArrayKey()"
        class="res-Downloads_Select"
      >
        <option
          v-for="(option, index) in options"
          :value="option.id"
        >
          {{ option.name }}
        </option>
      </select>
    </div>

    <ul
      v-if="isLoaded"
      class="res-Download_Items"
    >
      <li
        v-for="download in downloadsArrays[currentArrayKey].arrayGroup"
        class="res-Download_Item"
      >
        <a
          :href="download.download_file"
          :title="download.download_title"
          target="_blank"
          class="res-Download_Link"
        >
          {{ download.download_title }}
        </a>
      </li>
    </ul>

  </div>
</template>

<script>
export default {
  name: 'DownloadList',

  props: {
    postId: {
      type: String,
      default: undefined
    },
    postType: {
      type: String,
      default: undefined
    },
    label: {
      type: String,
      default: undefined
    }
  },

  data() {
    return {
      currentArrayKey: [],
      downloadsArrays: [],
      isLoaded: false,
      options: [],
      selectedOption: 0
    }
  },

  mounted() {
    this.getDownloads()
  },

  methods: {
    createOptions() {
      this.downloadsArrays.forEach((arr, index) => {
        this.options.push({
          'id': index,
          'name': arr.name,
          'value': this.handleifyString(arr.name)
        })
      })
    },

    getDownloads() {
      axios.get(`/wp-json/relevanssi/v1/search?_embed&p=${this.postId}`)
      .then((response) => {
        console.log(response);
        const downloadsData = response.data[0].acf.downloads
        this.downloadsArrays = this.splitArrayByProperty(downloadsData, 'option_name')
        this.createOptions()
        this.getCurrentArrayKey()
        this.isLoaded = true
      })
      .catch((error) => {
        console.error(error)
      })
    },

    handleifyString(str) {
      return str.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/-$/, '').replace(/^-/, '');
    },

    getCurrentArrayKey() {
      this.currentArrayKey = this.selectedOption
    },

    splitArrayByProperty(arr, property) {
      // TODO Rename variables in this function

      const names = []
      arr.forEach(o => {
        const propertyValue = o[property]
        if (names.indexOf(propertyValue) < 0) {
          names.push(propertyValue)
        }
      })

      const groupedArray = []
      names.forEach(name => {
        groupedArray.push({
          name,
          arrayGroup: arr.filter(o => o[property] === name)
        })
      })

      return groupedArray
    }
  }
}
</script>
