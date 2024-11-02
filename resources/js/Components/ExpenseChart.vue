<script setup>
import { ref, computed, watch } from 'vue'

const props = defineProps({
    chart_data: {
        type: Array,
        required: true,
    },
});

const chart_data = ref([...props.chart_data])

watch(() => props.chart_data,
    (newVal) => {
        chart_data.value = [...newVal]
    },
    { immediate: true }
);

const titles = computed(() => chart_data.value.map(item => item.title))

const totalAmounts = computed(() =>
    chart_data.value.map(item => parseInt(item.total_amount, 10) || 0)
);

const series = computed(() => totalAmounts.value)

const chartOptions = computed(() => ({
    chart: {
        width: 380,
        type: 'pie',
    },
    labels: titles.value,
    colors: [
        '#FF4560',
        '#008FFB',
        '#00E396',
        '#775DD0',
        '#FEB019',
        '#FF7F50',
        '#6A5ACD',
        '#FFD700',
        '#FF69B4',
        '#20B2AA'
    ],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200,
            },
            legend: {
                position: 'bottom',
            },
        },
    }],
}));
</script>

<template>
    <div id="chart" class="flex justify-center border border-black mt-3 w-full">
        <apexchart type="pie" width="400" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>
