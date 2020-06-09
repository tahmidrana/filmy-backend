<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Film List Component</div>

                    <div class="card-body">
                        Film List
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                films: []
            }
        },
        methods: {
            async getAllFilms() {
                const res = window.axios.get('/api/films');
                //this.films = data
                console.log(res.data)
            }
        },
        created() {
            console.log('Component mounted.')
            this.getAllFilms()
        }
    }
</script>
