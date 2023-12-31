import axios from "axios";
export default {
  name: "RegisterPage",
  data() {
    return {
      userInput: {
        name: "",
        email: "",
        password: "",
        },
        registerStatus: ""
    };
  },
  methods: {
      accRegister() {
          axios.post("http://localhost:8000/api/user/register", this.userInput).then((response) => {
              this.registerStatus = response.data.message;
              if (this.registerStatus == false) {
                  this.userInput.name = ""
                  this.userInput.email = "";
                  this.userInput.password = "";
              } else {
                  this.$router.push({
                    name: "login",
                  });
              }


          });
      }
  },
};