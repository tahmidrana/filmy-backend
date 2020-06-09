<template>
    <div class="container">
        <div class="row justify-content-center">
            <film-tile v-for="film in films" :key="film.id" :film="film"></film-tile>
        </div>
    </div>
</template>

<script>
    import FilmTile from './FilmTile.vue'
    export default {
        components: {
            FilmTile
        },
        data() {
            return {
                filmData: Object,
                films: []
            }
        },
        methods: {
            getAllFilms() {
                window.axios.get('/api/films').then(response => {
                    this.filmData = response.data
                    this.films = response.data.data
                })
            }
        },
        created() {
            this.getAllFilms()
        }
    }
</script>
