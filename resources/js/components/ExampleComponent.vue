<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <line-chart :chart-data="data" :height="200" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
            </div>
            <div class="col-md-6">
                <line-chart :chart-data="data" :height="200" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './js/LineChart';
    export default {
        components: {
          LineChart
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
                axios.get('admin/line-chart-js').then((response) => {
                    this.data = response.data;
                })
            }
        }
    }
</script>
