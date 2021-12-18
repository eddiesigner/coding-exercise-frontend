<template>
    <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0">Location</h2>
        </div>
        <div class="card-body">
            <div class="vstack gap-1">
                <div
                    v-for="location in locations"
                    :key="location"
                    class="form-check"
                >
                    <input
                        v-model="checkedLocations"
                        class="form-check-input"
                        type="checkbox"
                        :value="location"
                        :id="`location-${location}`"
                    />
                    <label
                        class="form-check-label"
                        :for="`location-${location}`"
                    >
                        {{ location }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        locations: {
            type: Array,
            default: () => [],
            required: true,
        },
    },
    data() {
        return {
            checkedLocations: [],
        };
    },
    watch: {
        checkedLocations() {
            this.applyFilter();
        },
    },
    methods: {
        applyFilter() {
            this.$emit("location-changed", this.checkedLocations);
        },
    },
};
</script>
