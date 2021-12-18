export default {
    data() {
        return {
            companies: [],
        };
    },
    created() {
        this.getCompanies();
    },
    methods: {
        async getCompanies() {
            try {
                const response = await window.axios.get("/companies");
                this.companies = _.orderBy(
                    response.data.companies,
                    ["name"],
                    ["asc"]
                );
            } catch (error) {
                console.log(error);
            }
        },
    },
};
