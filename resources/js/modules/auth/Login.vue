<template>
    <div class="login-container">
        <h1>Login</h1>
        <form @submit.prevent="handleLogin">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" v-model="email" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" v-model="password" required />
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            password: ''
        };
    },
    methods: {
        handleLogin() {
            const credentials = {
                email: this.email,
                password: this.password
            };

            // Make a post request to the Laravel /login route
            axios.post('/login', credentials)
                .then(response => {
                console.log('Login successful', response.data);
                if (response.status === 200) {
                    this.$inertia.visit('/');
                }
                // You can redirect to another page or handle login success here
                // window.location.href = '/dashboard'; // Example redirection
            })
                .catch(error => {
                console.error('Login failed:', error.response.data);
                // Handle login error here (e.g., display error messages)
            });
        }
    }
};
</script>

<style scoped>
.login-container {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #42b983;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #38a169;
}
</style>