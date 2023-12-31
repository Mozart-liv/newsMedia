import axios from "axios";
import moment from "moment";
import { mapGetters } from "vuex";
export default {
  name: "HomePage",
  data() {
    return {
		moment: moment,
		postLists: {},
		categoryLists: {},
		searchKey: "",
		tokenStatus: false
    };
  },
  computed: {
    ...mapGetters(["storageToken", "storageUserData"]),
  },
  methods: {
    getAllPost() {
      axios.get("http://localhost:8000/api/postList").then((response) => {
        for (let i = 0; i < response.data.post.length; i++) {
          if (response.data.post[i].image == null) {
            response.data.post[i].image =
              "http://localhost:8000/postImg/default.png";
          } else {
            response.data.post[i].image =
              "http://localhost:8000/postImg/" + response.data.post[i].image;
          }
        }

        this.postLists = response.data.post;
      });
    },
    getCategory() {
      axios
        .get("http://localhost:8000/api/categoryList")
        .then((response) => {
          this.categoryLists = response.data.category;
        })
        .catch((e) => {
          console.log(e);
        });
    },
    search(searchWhere, key) {
      let search = {
        key: key,
      };
      axios
        .post(`http://localhost:8000/api/${searchWhere}/search/`, search)
        .then((response) => {
          for (let i = 0; i < response.data.searchData.length; i++) {
            if (response.data.searchData[i].image == null) {
              response.data.searchData[i].image =
                "http://localhost:8000/postImg/default.png";
            } else {
              response.data.searchData[i].image =
                "http://localhost:8000/postImg/" +
                response.data.searchData[i].image;
            }
          }
          this.postLists = response.data.searchData;
        });
    },

    postSearch() {
      this.search("post", this.searchKey);
    },
    categorySearch(searchId) {
      this.search("category", searchId);
    },

    detailPage(id) {
      this.$router.push({
        name: "newsDetail",
        query: {
          newsId: id,
        },
      });
	},
	checkToken() {
		if (this.storageToken != null && this.storageToken != undefined && this.storageToken != "") {
			this.tokenStatus = true
		}
	}
  },
	mounted() {
		this.checkToken();
		this.getAllPost();
		this.getCategory();
  },
};
