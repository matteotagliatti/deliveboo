window.axios = require("axios");

window.Vue = require("vue");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import App from "./views/Show";
const app = new Vue({
    el: "#root",
    render: (h) => h(App),
});


new Vue({
    el: '#navbar',
    data () {
      return {
        view: {
          topOfPage: true
        }
      }
    },
    beforeMount() {
      window.addEventListener('scroll', this.handleScroll)
    },
    methods: {
      handleScroll(){
        if(window.pageYOffset>0){
          if(this.view.topOfPage) this.view.topOfPage = false
        } else {
          if(!this.view.topOfPage) this.view.topOfPage = true;

        }
      }
    },
  })
