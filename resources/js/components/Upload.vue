<template>
    <div class="mt-5 container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-white">
                    <div class="card-header">Upload file</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Upload images for gallery</label>
                            <input type="file" class="form-control" multiple @change="fileChange">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    methods: {
        fileChange(e){
            console.log(e)
        }
    }
}

</script>