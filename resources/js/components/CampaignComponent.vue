<template>
    <div>
        <h3>Campaigns</h3>
        <button type="button" class="btn btn-success" @click="showCreate = true">Create</button>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Headline</th>
                <th scope="col">Message</th>
                <th scope="col">Time</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(campaign, index) in campaigns" :key="campaign.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ campaign.name }}</td>
                <td>{{ campaign.headline }}</td>
                <td>{{ campaign.message }}</td>
                <td>{{ campaign.time }}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" @click="deleteCampaign(campaign.id)">Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <modal-component
                v-if="showCreate"
                @save="saveCampaign"
                @close="showCreate = false">
            <template slot="header">
                Create Campaign
            </template>
            <template slot="body">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="name">
                <label for="name">Headline</label>
                <input type="text" class="form-control" id="name" v-model="headline">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" v-model="message"></textarea>
                <label for="time">Time (hr)</label>
                <input type="number" class="form-control" id="time" min="1" max="24" v-model="time">
            </template>
        </modal-component>
    </div>
</template>

<script>

    import ModalComponent from './modals/ModalComponent'

    export default {
        name: "CampaignComponent",
        data() {
            return {
                campaigns: {},
                showCreate: false,
                name: '',
                headline: '',
                message: '',
                time: null
            }
        },
        mounted() {
            this.getCampaigns();
        },
        methods: {
            getCampaigns() {
                axios.get('/campaign/get')
                    .then(response => {
                        this.campaigns = response.data.campaigns;
                    })
                    .catch(error => console.log(error));
            },
            saveCampaign() {
                axios.post('/campaign/save', {
                    name: this.name,
                    headline: this.headline,
                    message: this.message,
                    time: this.time
                });
                this.showCreate = false;
                this.getCampaigns();
            },
            deleteCampaign(id) {
                axios.post('/campaign/delete', {
                    id: id,
                });
                this.getCampaigns();
            }
        },
        components: {
            ModalComponent
        }
    }
</script>

<style scoped>
    button, input, textarea {
        margin-bottom: 10px;
    }

    td button {
        min-width: 60px;
    }
</style>