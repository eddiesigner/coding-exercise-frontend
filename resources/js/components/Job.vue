<template>
    <div class="card shadow-sm">
        <div class="card-body">
            <div v-if="isInactive" class="mb-3">
                <span class="badge rounded-pill bg-secondary">Inactive</span>
            </div>
            <div :class="{ 'opacity-50': isInactive }">
                <h3 class="card-title text-primary h4">
                    {{ job.title }}
                </h3>
                <p class="card-text">{{ job.company_name }}</p>
                <p class="text-secondary">{{ job.description }}</p>
                <div class="hstack gap-3">
                    <p class="text-secondary mb-0">
                        {{ job.location }}
                    </p>
                    <p class="text-secondary small ms-auto mb-0">
                        {{ job.published_at }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        job: {
            type: Object,
            default: () => {},
            required: true,
        },
    },
    computed: {
        isInactive() {
            return this.job.active === 0;
        },
    },
};
</script>
