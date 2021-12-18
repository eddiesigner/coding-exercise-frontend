<template>
    <div class="card">
        <div class="card-header">
            <h1 class="h4">Add a new job ad</h1>
        </div>
        <div class="card-body">
            <div v-if="error" class="alert alert-danger" role="alert">
                Please make sure you enter all the necessary information and try
                again.
            </div>
            <form @submit.prevent="onSubmit">
                <div class="row mb-3">
                    <label for="title" class="col-lg-3 col-form-label"
                        >Title</label
                    >
                    <div class="col-lg-9">
                        <input
                            v-model="title"
                            type="text"
                            class="form-control"
                            id="title"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-lg-3 col-form-label"
                        >Description</label
                    >
                    <div class="col-lg-9">
                        <textarea
                            id="description"
                            v-model="description"
                            class="form-control"
                            rows="3"
                        ></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="location" class="col-lg-3 col-form-label"
                        >Location</label
                    >
                    <div class="col-lg-9">
                        <input
                            v-model="location"
                            type="text"
                            class="form-control"
                            id="location"
                        />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="company" class="col-lg-3 col-form-label">
                        Company
                    </label>
                    <div class="col-lg-9">
                        <select
                            id="company"
                            v-model="company"
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option value="">Select a company</option>
                            <option
                                v-for="company in companies"
                                :key="company.id"
                                :value="company.id"
                            >
                                {{ company.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
import CompaniesMixin from "../mixins/companies";

export default {
    mixins: [CompaniesMixin],
    data() {
        return {
            title: "",
            description: "",
            location: "",
            company: "",
            error: false,
        };
    },
    methods: {
        async onSubmit() {
            if (
                this.title &&
                this.description &&
                this.location &&
                this.company
            ) {
                this.error = false;

                try {
                    await window.axios.post("/admin/add", {
                        title: this.title,
                        description: this.description,
                        location: this.location,
                        company: this.company,
                    });

                    window.location = "/";
                } catch (error) {
                    this.error = true;
                }
            } else {
                this.error = true;
            }
        },
    },
};
</script>
