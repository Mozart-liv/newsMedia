import axios from "axios";
import { mapGetters } from "vuex";
export default {
  name: "NewsDetail",
  data() {
    return {
      postId: 0,
	posts: {},
	viewCount: ""
	};
  },
  computed: {
    ...mapGetters(['storageUserData'])
  },
  methods: {
    loadPost(id) {
      const post = {
        postId: id,
      };
      axios
        .post("http://localhost:8000/api/post/detail", post)
        .then((response) => {
			if (response.data.post.image == null) {
				response.data.post.image =
				"http://localhost:8000/postImg/default.png";
			} else {
				response.data.post.image =
				"http://localhost:8000/postImg/" + response.data.post.image;
			}
			this.posts = response.data.post;
		
        })
        .catch((e) => {
          console.log(e);
        });
	},
	loadAction() {
		const data = {
			postId: this.$route.query.newsId,
			userId: this.storageUserData.id
		}

		axios.post("http://localhost:8000/api/post/actionLog", data).then((response) => {
			this.viewCount = response.data.post.length
		});
	}
  },
  mounted() {
	this.loadAction();
    this.postId = this.$route.query.newsId;
    this.loadPost(this.postId);
  },
};
