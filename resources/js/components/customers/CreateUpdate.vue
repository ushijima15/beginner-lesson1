<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" key="admin">
                <div class="card-body">
                    <div class="d-flex justify-content-start mb-3">
                        <div class="mr-auto">
                            <span class="span-header">{{title}}</span>
                        </div>
                        <div class="align-self-center">
                            <button type="button" class="btn btn-dark" @click="onBack">戻る</button>
                        </div>
                    </div>
                    <form>
                        <div class="form-group required-label row">
                            <label for="last_name" class="col-sm-4 col-form-label text-md-right">姓</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="last_name" v-model="customer.last_name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-4 col-form-label text-md-right">名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="first_name" v-model="customer.first_name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_phonetic_name" class="col-sm-4 col-form-label text-md-right">カナ姓</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="last_phonetic_name" v-model="customer.last_phonetic_name"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_phonetic_name" class="col-sm-4 col-form-label text-md-right">カナ名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="first_phonetic_name" v-model="customer.first_phonetic_name"/>
                            </div>
                        </div>
                        
                        <!-- <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <label for="use_login" class="col-form-label"></label>
                            </div>
                            <div class="col-md-8 pt-1">
                                <div class="custom-control custom-checkbox mt-1">
                                    <input type="checkbox" class="custom-control-input" id="use_login" v-model="employee.use_login">
                                    <label class="custom-control-label" for="use_login">システムを利用する</label>
                                </div>
                            </div>
                        </div> -->
                        <!-- <template v-if="employee.use_login"> -->
                        <!-- <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Mail</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="email" v-model="employee.email"/>
                            </div>
                        </div> -->
                        <div class="form-group required-label row">
                            <label for="company_name" class="col-sm-4 col-form-label text-md-right">会社名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="company_name" v-model="customer.company_name"/>
                            </div>
                        </div>
                        <div class="form-group row" v-if="mode=='create'">
                            <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="address" v-model="customer.address"/>
                            </div>
                        </div>
                        <div class="form-group row" v-else>
                            <label for="password" class="col-md-4 col-form-label text-md-right">住所</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="password" v-model="customer.password"/>
                                <div class="text-muted"><small>※変更する場合は入力してください。</small></div>
                            </div>
                        </div>
                        <!-- </template> -->
                        <div class="row-line">
                            <transition name="fade" mode="out-in">
                            <div class="alert alert-danger" role="alert" v-if="invalid">
                            {{errorMessage}}
                            </div>
                            </transition>
                        </div>
                    </form>
                    <div class="d-flex justify-content-start mt-4">
                        <div class="mr-auto">
                            <button type="button" class="btn btn-outline-danger" v-if="enable_delete" @click="onDelete">この顧客を削除する</button>
                        </div>
                        <div class="mr-3">
                            <button type="button" class="btn btn-dark" @click="onBack">キャンセル</button>
                        </div>
                        <div v-if="mode!='create'">
                            <button type="button" class="btn btn-primary" @click="onStore">保存する</button>
                        </div>
                        <div v-else>
                            <button type="button" class="btn btn-primary" @click="onStore">登録する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <loading :active.sync="isLoading" :is-full-page="fullPage"></loading>
</div>
</template>

<script>
import moment from 'moment';
export default {
    props: [
        'customer_id',
    ],
    data () {
        return {
            customer: {
                id: '',
                first_name: '',
                last_name: '',
                first_phonetic_name: '',
                last_phonetic_name: '',
                // email: '',
                company_name: '',
                address: '',
            },
            
            invalid: false,
            errorMessage: '',

            isLoading: false,
            fullPage: false,
        }
    },
    created () {
        this.getItems()
    },
    watch: {
        // 
    },
    computed: {
        own: function () {
            return this.$store.state.user
        },
        title: function () {
            return this.mode == 'create' ? '顧客の新規作成' : '顧客の編集'
        },
        mode: function () {
            return this.customer_id ? 'update' : 'create'
        },
        enable_delete: function () {
            if (this.mode == 'create') {
                return false
            }
            return this.own.customer_id != this.customer_id
        },
    },
    methods: {
        getItems: function () {
            this.isLoading = true;
            const api = axios.create()
            if (this.mode == "create") {
                // axios.all([
                //     api.get('/api/factory/selector'),
                //     api.get('/api/department/selector'),
                // ]).then(axios.spread((res1, res2, res3) => {
                //     this.factories = res1.data
                //     this.departments = res2.data
                //     this.isLoading = false
                // }))
                this.isLoading = false
            } else {
                axios.all([
                    api.get('/api/customer/'+this.customer_id),
                    // api.get('/api/factory/selector'),
                    // api.get('/api/department/selector'),
                ]).then(axios.spread((res1, res2, res3) => {
                    this.customer = res1.data
                    // this.factories = res2.data
                    // this.departments = res3.data
                    this.isLoading = false
                }))
            }
        },
        onStore: function () {
            this.invalid = false
            this.errorMessage = ''
            
            if (!this.customer.last_name) {
                this.errorMessage = '姓を入力してください。'
                this.invalid = true
                return
            }
            if (!this.customer.company_name) {
                this.errorMessage = '会社名を入力してください。'
                this.invalid = true
                return
            }

            let _this = this
            if (this.mode == 'create') {
                axios.post('/api/customer', {
                    customer: this.customer,
                })
                .then(function (resp) {
                    if (resp.data.result) {
                        alert('登録しました。')
                        _this.$router.go(-1)
                    } else {
                        _this.errorMessage = resp.data.errorMessage
                        _this.invalid = true
                    }
                })
                .catch(function (resp) {
                    console.log(resp)
                });
            } else {
                axios.put('/api/customer/'+this.customer.id, {
                    customer: this.customer,
                })
                .then(function (resp) {
                    if (resp.data.result) {
                        alert('更新しました。')
                        _this.$router.go(-1)
                    } else {
                        _this.errorMessage = resp.data.errorMessage
                        _this.invalid = true
                    }
                })
                .catch(function (resp) {
                    console.log(resp)
                });
            }
        },
        onBack: function () {
            this.$router.go(-1)
        },
        onDelete: function () {
            if (!confirm('削除してもよろしいですか？')) {
                return
            }
            let _this = this
            axios.delete('/api/customer/'+this.customer.id)
            .then(function (resp) {
                alert('削除しました。')
                _this.$router.go(-1)
            })
            .catch(function (resp) {
                console.log(resp)
            })
            .finally(function () {
                //
            })
        },

    },
    components: {
        // Loading
    },
}
</script>

<style lang="scss" scoped>
@import "resources/sass/variables";
.row-line {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    padding-bottom: 1rem;
}
.form-content {
    width: 12rem;
    padding-left: 1rem;
    padding-right: 1rem;
    display: inline-block;
}
.form-content-lg {
    width: 15rem;
    padding-left: 1rem;
    padding-right: 1rem;
    display: inline-block;
}
.required-label label:after {
    display: inline-block;
    margin-left: 5px;
    padding: 2px 4px;
    border-radius: 3px;
    background-color: #ec5d53;
    color: #fff;
    content: "必須";
    font-size: 9px;
    line-height: 10px;
}
</style>
