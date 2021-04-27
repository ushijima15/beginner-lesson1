<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">顧客一覧</span>
                        </div>
                        <div class="align-self-center mr-3">
                            <button type="button" class="btn btn-primary" @click="onCreate"><i class="fas fa-plus"></i> 新規追加</button>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>

                    <table class="table-custom" key="processes">
                        <thead>
                            <tr>
                                <th class="text-center">氏名</th>
                                <th class="text-center">フリガナ</th>
                                <th class="text-center">会社名</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr v-for="customer in customers" class="clickable" :key="customer.id" @click="onShow(customer.id)">
                                <td class="text-center align-middle">{{customer.full_name}}</td>
                                <td class="text-center align-middle">{{customer.full_phonetic_name}}</td>
                                <td class="text-center align-middle">{{customer.company_name}}</td>
                            </tr>
                        </tbody>
                        <loading :active.sync="isLoading"></loading>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import moment from 'moment';
export default {
    props: [
        
    ],
    data () {
        return {
            customers: [],
            isLoading: false,
        }
    },
    mounted () {
        //this.inspected_on = new moment().format('YYYY-MM-DD')
        this.getItems()
    },
    watch: {
        //
    },
    computed: {
        //
    },
    methods: {
        getItems: function () {
            this.isLoading = true;
            const api = axios.create()
            axios.all([
                api.get('/api/customer'),
            ]).then(axios.spread((res1, res2, res3, res4) => {
                this.customers = res1.data
                this.isLoading = false
            }))
        },
        onCreate: function () {
            this.$router.push({ name: 'customer.create' })
        },
        onShow: function (customer_id) {
            this.$router.push({ name: 'customer.show', params: {customer_id: customer_id} })
        },
        onBack: function () {
            this.$router.go(-1)
        }
    },
    components: {
        // Loading
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
</style>