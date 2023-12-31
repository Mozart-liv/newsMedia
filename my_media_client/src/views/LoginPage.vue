<template>
    <div class="container col-5 my-5 shadow p-5">
        <span class="text-danger" v-if="!loginStatus">*The Credential Do not match, please try again...</span>
        <h3 class="mb-4 text-danger border-bottom border-dark py-2">Login Form</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" v-model="userData.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" v-model="userData.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" @click="accountLogin()" class="btn btn-primary p-4 mt-3">Login</button>
            
            <div class="mt-3" @click="registerPage()">
                <a  class="text-primary">Haven't Account Yet? click here to register</a>
            </div>
            
    </div>
</template>

<script src="../js/LoginPage.js"></script>



