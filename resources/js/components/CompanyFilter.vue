<template>
    <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0">Company</h2>
        </div>
        <div class="card-body">
            <div class="vstack gap-1">
                <div
                    v-for="company in companies"
                    :key="company.id"
                    class="form-check"
                >
                    <input
                        v-model="checkedCompanies"
                        class="form-check-input"
                        type="checkbox"
                        :value="company.id"
                        :id="`company-${company.id}`"
                    />
                    <label
                        class="form-check-label"
                        :for="`company-${company.id}`"
                    >
                        {{ company.name }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        companies: {
            type: Array,
            default: () => [],
            required: true,
        },
    },
    data() {
        return {
            checkedCompanies: [],
        };
    },
    watch: {
        checkedCompanies() {
            this.applyFilter();
        },
    },
    methods: {
        applyFilter() {
            this.$emit("company-changed", this.checkedCompanies);
        },
    },
};
</script>
