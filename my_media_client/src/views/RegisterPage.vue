<template>
    <div class="container col-5 my-5 shadow p-5">
        <span class="text-danger" v-if="registerStatus === false">*Email is already used, please try another one...</span>
        <h3 class="mb-4 text-danger border-bottom border-dark py-2">Register Form</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="email" v-model="userInput.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" v-model="userInput.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" v-model="userInput.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" @click="accRegister()" class="btn btn-primary p-4 mt-3">Register</button>
            
            
    </div>
</template>

<script src="../js/RegisterPage.js"></script>


