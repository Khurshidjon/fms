<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <radar-chart :chart-data="data" :height="200" :options="{responsive: true, maintainAspectRatio: true}"></radar-chart>
            </div>
            <div class="col-md-6">
                <radar-chart :chart-data="data" :height="200" :options="{responsive: true, maintainAspectRatio: true}"></radar-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import RadarChart from './js/RadarChart';
    export default {
        components: {
            RadarChart
        },
        data: function(){
            return {
                data: []
            }
        },
        mounted() {
            this.update();
        },
        methods: {
            update: function () {
                axios.get('admin/radar-chart-js').then((response) => {
                    this.data = response.data;
                })
            }
        }
    }
</script>
