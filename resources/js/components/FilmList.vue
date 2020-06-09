<template>
    <div class="container" v-if="films.length">
        <div class="row">
            <film-tile v-for="film in films" :key="film.id" :film="film"></film-tile>
        </div>
        <div class="row mt-4 ml-1">
            <ul class="pagination">
                <li class="page-item"><button class="page-link" @click="getAllFilms(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">Previous</button></li>
                <li class="page-item"><a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a></li>
                <li class="page-item"><button class="page-link" @click="getAllFilms(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next</button></li>
            </ul>
        </div>
    </div>
    <p class="container text-center" v-else>No Data Found :(</p>
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
                films: [],
                pagination: {}
            }
        },
        methods: {
            getAllFilms(page_url) {
                page_url = page_url || '/api/films'
                window.axios.get(page_url).then(response => {
                    this.filmData = response.data
                    this.films = response.data.data
                    this.makePagination(response.data)
                })
            },

            makePagination(data) {
                this.pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                }
            }
        },
        created() {
            this.getAllFilms()
        }
    }
</script>
