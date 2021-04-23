<template>
  <div
    class="bg-white bottom-0 right-2 w-full"
  >
    <nav
      class="w-full h-10 bg-blue-400 flex justify-between items-center"
    >
      <div class="flex justify-center items-center">
        <i class="mdi mdi-arrow-left font-normal text-gray-300 ml-1"></i>
        <!-- <img src="https://i.imgur.com/IAgGUYF.jpg" class="rounded-full ml-1" width="25" height="25"> -->
        <span class="text-base font-bold font-medium text-white ml-1"
          >Alex cairo Chat Line: {{ props_data.line_id }}</span
        >
      </div>
      <div class="flex items-center">
        <!-- <i
          class="fas fa-times text-white hover:text-gray-200 mr-4"
          @click="selfDestruct()"
        ></i> -->
      </div>
    </nav>
    <div>
      <div
        class="overflow-auto px-1 py-1"
        style="height: 35rem"
        id="journal-scroll"
      >
        <div class="flex items-center pr-10">
          <!-- <img src="https://i.imgur.com/IAgGUYF.jpg" class="rounded-full shadow-xl" width="15" height="15" style="box-shadow: "> -->
          <span
            class="shadow-md flex ml-1 h-auto bg-gray-500 text-gray-200 text-base font-bold rounded-sm px-1 p-1 items-end rounded"
            style="font-size: 10px"
          >
            Hi Dr.Hendrikson, I haven't been feeling well for past few days.
            <span class="text-white pl-1" style="font-size: 8px">01:25am</span>
          </span>
        </div>

        <div class="flex justify-end pt-2 pl-10">
          <span
            class="shadow-md bg-blue-400 h-auto text-white text-base font-bold rounded-sm px-1 p-1 items-end flex justify-end rounded"
            style="font-size: 10px"
          >
            Lets jump on a video call.
            <span class="text-white pl-1" style="font-size: 8px">02.30am</span>
          </span>
        </div>
        <div class="" id="chatmsg"></div>
      </div>
      <div class="flex justify-between items-center p-4">
        <div class="flex flex-grow">
          <!-- <i class="mdi mdi-emoticon-excited-outline absolute top-1 left-1 text-gray-400" style="font-size: 17px !important;font-weight: bold;"></i> -->
          <input
            type="text"
            v-model="overview.message"
            v-on:keyup.enter="sendChat()"
            class="border-0 rounded-md pl-6 pr-12 mr-2 py-2 w-full focus:outline-none h-auto placeholder-gray-400 bg-gray-200 focus:bg-gray-100"
            style="font-size: 11px;"
            placeholder="Type a message..."
            id="typemsg"
          />
          <!-- <i class="mdi mdi-paperclip absolute right-8 top-1 transform -rotate-45 text-gray-400"></i> -->
          <!-- <i class="mdi mdi-camera absolute right-2 top-1 text-gray-400"></i> -->
        </div>
        <div
          class="w-7 h-7 rounded-full bg-blue-300 text-center items-center flex justify-center"
        >
          <button
            class="w-7 h-7 rounded-full text-center items-center flex justify-center outline-none hover:bg-gray-300 hover:text-white"
            @click="sendChat()"
          >
            <i class="fas fa-paper-plane"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["data"],
  data() {
    return {
      hide_panel: true,
      props_data: JSON.parse(this._props.data),
      overview: {
        message: "",
      },
    };
  },
  methods: {
    selfDestruct() {
        console.log(this.$el)
    },
    sendChat() {
      var $this = this;
      if ($this.overview.message === "") {
        return false;
      }
      axios.post(this.props_data.send_link, this.overview).then(function () {
        $this.overview.message = "";
      });
    },
  },
  mounted() {
    Echo.channel("form-ofw").listen("chat-line-" + this.props_data.line_id, (e) => {
      console.log(e);
    });
  },
};
</script>
