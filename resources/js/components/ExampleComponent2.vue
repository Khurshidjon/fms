<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <pie-chart :chart-data="data" :height="200" :options="{responsive: true, maintainAspectRatio: true}"></pie-chart>
            </div>
            <div class="col-md-6">
                <bar-chart :chart-data="bar" :height="200" :options="{responsive: true, maintainAspectRatio: true}"></bar-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import PieChart from './js/PieChart';
    import BarChart from './js/BarChart';
    export default {
        components: {
            PieChart,
            BarChart
        },
        data: function(){
            return {
                data: [],
                bar: []
            }
        },
        mounted() {
            this.update();
            this.barUpdate();
        },
        methods: {
            update: function () {
                axios.get('/pie-chart-js').then((response) => {
                    this.data = response.data;
                })
            },
            barUpdate: function () {
                axios.get('/bar-chart-js').then((response) => {
                    this.bar = response.data;
                })
            }
        }
    }
</script>
