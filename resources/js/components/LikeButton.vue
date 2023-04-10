<template>
    <div >
        <button class="btn h4" @click="likeEvent" v-text="buttonText"></button>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        props:['event_id', 'like'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.like
            }
        },
        methods:{
            likeEvent(){
               axios.post('/likeevent/'+this.event_id).then(
                this.status = !this.status
               )
            }
        },
        computed:{
            buttonText(){
                return (this.status) ? 'Desgostar' : 'Gostar'
            }
        }
    }
</script>
