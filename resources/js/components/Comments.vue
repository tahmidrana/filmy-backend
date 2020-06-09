<template>
    <div class="py-4">
        <h4>Comments</h4>
        <div class="card">
            <div class="card-header">
                <form @submit.prevent="processForm">
                    <textarea class="form-control" v-model="comment_body" rows="2" placeholder="Write your comment"></textarea>
                    <input type="submit" class="btn btn-primary btn-sm float-right mt-2" value="Comment">
                </form>
            </div>
            <div class="card-body" v-if="comments.length">
                <div v-for="comment in comments" :key="comment.id" class="my-2">
                    <span class="text-muted">{{ comment.user.name }}</span>
                    <p class="card-text">{{ comment.comment_body }}</p>
                    <hr>
                </div>            
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
                comments: [],
                comment_body: ''
            }
        },
        methods: {
            getAllComments() {
                var id = window.location.href.split('/').pop()
                window.axios.get(`/api/films/${id}/comments`).then(response => {
                    this.comments = response.data
                })
            },
            
            processForm() {
                if(this.comment_body.length > 0) {
                    
                } else {
                    alert("Cant submit empty comment")
                }
            }
        },
        created() {
            this.getAllComments()        }
        }
</script>
