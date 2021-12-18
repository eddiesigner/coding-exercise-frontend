<template>
    <div class="row gx-5">
        <aside class="d-none d-md-flex col-md-4 vstack gap-4 pb-5">
            <LocationFilter
                :locations="locations"
                @location-changed="onLocationFilter"
            />
            <CompanyFilter
                :companies="companies"
                @company-changed="onCompanyFilter"
            />
        </aside>
        <main class="col-md-8">
            <Search @search-performed="onSearchFilter" />
            <div class="py-5">
                <div v-if="filteredJobs.length > 0" class="vstack gap-3">
                    <Job v-for="job in filteredJobs" :key="job.id" :job="job" />
                </div>
                <div v-if="filteredJobs.length === 0" class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">No jobs found</h5>
                        <p class="card-text">
                            Please search for another job title or adjust your
                            filters to get better results.
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import CompaniesMixin from "../mixins/companies";

export default {
    props: {
        jobs: {
            type: Array,
            default: () => [],
            required: true,
        },
    },
    mixins: [CompaniesMixin],
    data() {
        return {
            searchFilter: "",
            locationFilters: [],
            companyFilters: [],
        };
    },
    computed: {
        mappedJobs() {
            const jobs = this.jobs.map((job) => {
                const jobCompany = this.companies.find(
                    (company) => company.id === job.company_id
                );
                return {
                    ...job,
                    company_name: jobCompany ? jobCompany.name : "",
                };
            });

            return _.orderBy(jobs, ["published_at"], ["desc"]);
        },
        filteredJobs() {
            return this.filterJobs(this.mappedJobs);
        },
        locations() {
            const locations = this.jobs.map((job) => job.location);
            return _.orderBy(_.uniq(locations), String, ["asc"]);
        },
    },
    methods: {
        onSearchFilter(filter) {
            this.searchFilter = filter;
        },
        onLocationFilter(filters) {
            this.locationFilters = filters;
        },
        onCompanyFilter(filters) {
            this.companyFilters = filters;
        },
        filterJobs(jobs) {
            let filteredJobs = jobs;

            if (this.searchFilter) {
                filteredJobs = this.filterJobsBySearch(filteredJobs);
            }

            if (this.locationFilters.length > 0) {
                filteredJobs = this.filterJobsByLocation(filteredJobs);
            }

            if (this.companyFilters.length > 0) {
                filteredJobs = this.filterJobsByCompany(filteredJobs);
            }

            return filteredJobs;
        },
        filterJobsBySearch(jobs) {
            return jobs.filter((job) =>
                job.title
                    .toLowerCase()
                    .includes(this.searchFilter.toLowerCase())
            );
        },
        filterJobsByLocation(jobs) {
            return jobs.filter((job) =>
                this.locationFilters.includes(job.location)
            );
        },
        filterJobsByCompany(jobs) {
            return jobs.filter((job) =>
                this.companyFilters.includes(job.company_id)
            );
        },
    },
};
</script>
