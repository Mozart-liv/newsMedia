import axios from "axios";
import { mapGetters } from "vuex";
export default {
  name: "LoginPage",
  data() {
    return {
      userData: {
        email: "",
        password: "",
		},
		loginStatus: true
    };
  },
  computed: {
    ...mapGetters(["storageToken", "storageUserData"]),
  },
  methods: {
    accountLogin() {
      axios
        .post("http://localhost:8000/api/user/login", this.userData)
        .then((response) => {
          if (response.data.token == null || response.data.token == undefined) {
            this.loginStatus = false
		} else {
			this.storeUserInfo(response);
			this.$router.push({
				name: 'home'
			});
          }
        })
        .catch((e) => {
          console.log(e);
		});
		
	},
	storeUserInfo(response) {
		this.$store.dispatch("setToken", response.data.token);
        this.$store.dispatch("setUserData", response.data.user);
  },
    registerPage() {
		this.$router.push({
    name: "registerPage",
    });
  }
  },
};
