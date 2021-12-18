<template>
    <div class="card">
        <div class="card-header">
            <h1 class="h4">Log in and get started</h1>
        </div>
        <div class="card-body">
            <div v-if="error" class="alert alert-danger" role="alert">
                Wrong credentials, please try again.
            </div>
            <form @submit.prevent="onSubmit">
                <div class="row mb-3">
                    <label for="username" class="col-lg-3 col-form-label"
                        >Username</label
                    >
                    <div class="col-lg-9">
                        <input
                            v-model="username"
                            type="text"
                            class="form-control"
                            id="username"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-lg-3 col-form-label"
                        >Password</label
                    >
                    <div class="col-lg-9">
                        <input
                            v-model="password"
                            type="password"
                            class="form-control"
                            id="password"
                        />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: "",
            password: "",
            error: false,
        };
    },
    methods: {
        onSubmit() {
            if (this.username === "admin" && this.password === "Pa$$w0rd!") {
                this.error = false;
                window.location = "/admin";
            } else {
                this.error = true;
            }
        },
    },
};
</script>
