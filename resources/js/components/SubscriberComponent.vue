<template>
    <div>
        <h3>Subscribers</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">IP</th>
                <th scope="col">Timezone</th>
                <th scope="col">User Agent</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(subscriber, index) in subscribers" :key="subscriber.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ subscriber.name }}</td>
                <td>{{ subscriber.ip_address }}</td>
                <td>{{ subscriber.timezone }}</td>
                <td>{{ subscriber.user_agent }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "SubscriberComponent",
        data() {
            return {
                subscribers: {}
            }
        },
        mounted() {
            axios.get('/subscriber/get')
                .then(response => {
                    this.subscribers = response.data.subscribers;
                })
                .catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>