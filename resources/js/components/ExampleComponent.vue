<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userid'],
        data: () => ({
            notifications: [],
            filteredNotifications: [],
            unreadNotifications: []
        }),
        watch: {
        },
        computed: {

        },
        mounted() {
            Echo.channel('laravel_database_App.User.'+this.userid)
                .notification((notification) => {
                    console.log(notification)
                     console.log(this.userid)
                });
           
        },
    }
</script>
