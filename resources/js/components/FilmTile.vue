<template>
    <div class="col-md-4">
        <div class="card">
            <img :src="imageSrc" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title"><a :href="redirectUrl">{{ film.name }}</a></h5>
                <p class="card-text">{{ description }}</p>
                <small>{{ film.release_date|dateFormat }}</small> <br>
                <span class="text-muted" v-for="genre in film.genres" :key="genre.id">#{{ genre.title }}</span>&nbsp;
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['film'],
        computed: {
            imageSrc() {
                return '/uploads/' + this.film.photo 
            },
            description() {
                return this.film.description.slice(0, 100) 
            },
            redirectUrl() {
                return '/films/' + this.film.slug + '/' + this.film.id
            }
        },
        filters: {
            dateFormat(date) {
                var d = new Date(date).toString().split(' '),
                month = d[1], day = d[2], year = d[3];
                return day + ' ' + month + ', ' + year;
            }
        }
    }
</script>

<style scoped>
img{
    width: 100%;
    max-height: 200px;
}
</style>
