<template>
    <form class="d-flex">
        <input
            v-model="searchTerm"
            class="form-control form-control-lg rounded-pill bg-white"
            type="search"
            placeholder="Search by job title"
            aria-label="Search"
        />
    </form>
</template>

<script>
export default {
    data() {
        return {
            searchTerm: "",
            timer: null,
        };
    },
    watch: {
        searchTerm() {
            if (this.timer) {
                clearTimeout(this.timer);
            }

            this.timer = setTimeout(() => {
                this.applyFilter();
            }, 300);
        },
    },
    methods: {
        applyFilter() {
            this.$emit("search-performed", this.searchTerm);
        },
    },
};
</script>
