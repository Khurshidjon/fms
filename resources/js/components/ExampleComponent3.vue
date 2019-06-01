<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <bar-chart :chart-data="data" :height="150" :options="{responsive: true, maintainAspectRatio: true}"></bar-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import BarChart from './js/BarChart';
    export default {
        components: {
            BarChart
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
                axios.get('/bar-chart-js').then((response) => {
                    this.data = response.data;
                })
            }
        }
    }
</script>
