<template>
    <!-- Modal Component -->
    <b-modal v-model="isShow" size="lg" header-bg-variant="primary" header-text-variant="white" hide-footer title="顧客の選択" @hide="onHide">
        <b-tabs>
            <b-tab title="あ行" active>
                <select-name :customers="filterCustomerA" @selected="onSelected"/>
            </b-tab>
            <b-tab title="か行" >
                <select-name :customers="filterCustomerK" @selected="onSelected"/>
            </b-tab>
            <b-tab title="さ行">
                <select-name :customers="filterCustomerS" @selected="onSelected"/>
            </b-tab>
            <b-tab title="た行">
                <select-name :customers="filterCustomerT" @selected="onSelected"/>
            </b-tab>
            <b-tab title="な行">
                <select-name :customers="filterCustomerN" @selected="onSelected"/>
            </b-tab>
            <b-tab title="は行">
                <select-name :customers="filterCustomerH" @selected="onSelected"/>
            </b-tab>
            <b-tab title="ま行">
                <select-name :customers="filterCustomerM" @selected="onSelected"/>
            </b-tab>
            <b-tab title="や行">
                <select-name :customers="filterCustomerY" @selected="onSelected"/>
            </b-tab>
            <b-tab title="ら行">
                <select-name :customers="filterCustomerR" @selected="onSelected"/>
            </b-tab>
            <b-tab title="わ行">
                <select-name :customers="filterCustomerW" @selected="onSelected"/>
            </b-tab>
        </b-tabs>
    </b-modal>
</template>

<script>
export default {
    props: [
        'modalShow',
        'customers',
    ],
    data() {
        return {
            isShow: false,
        }
    },
    computed: {
        filterCustomerA: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('あ') == 0 ||
                       value.full_phonetic_name.indexOf('い') == 0 ||
                       value.full_phonetic_name.indexOf('う') == 0 ||
                       value.full_phonetic_name.indexOf('え') == 0 ||
                       value.full_phonetic_name.indexOf('お') == 0
            })
        },
        filterCustomerK: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('か') == 0 ||
                       value.full_phonetic_name.indexOf('き') == 0 ||
                       value.full_phonetic_name.indexOf('く') == 0 ||
                       value.full_phonetic_name.indexOf('け') == 0 ||
                       value.full_phonetic_name.indexOf('こ') == 0 ||
                       value.full_phonetic_name.indexOf('が') == 0 ||
                       value.full_phonetic_name.indexOf('ぎ') == 0 ||
                       value.full_phonetic_name.indexOf('ぐ') == 0 ||
                       value.full_phonetic_name.indexOf('げ') == 0 ||
                       value.full_phonetic_name.indexOf('ご') == 0
            })
        },
        filterCustomerS: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('さ') == 0 ||
                       value.full_phonetic_name.indexOf('し') == 0 ||
                       value.full_phonetic_name.indexOf('す') == 0 ||
                       value.full_phonetic_name.indexOf('せ') == 0 ||
                       value.full_phonetic_name.indexOf('そ') == 0 ||
                       value.full_phonetic_name.indexOf('ざ') == 0 ||
                       value.full_phonetic_name.indexOf('じ') == 0 ||
                       value.full_phonetic_name.indexOf('ず') == 0 ||
                       value.full_phonetic_name.indexOf('ぜ') == 0 ||
                       value.full_phonetic_name.indexOf('ぞ') == 0
            })
        },
        filterCustomerT: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('た') == 0 ||
                       value.full_phonetic_name.indexOf('ち') == 0 ||
                       value.full_phonetic_name.indexOf('つ') == 0 ||
                       value.full_phonetic_name.indexOf('て') == 0 ||
                       value.full_phonetic_name.indexOf('と') == 0 ||
                       value.full_phonetic_name.indexOf('だ') == 0 ||
                       value.full_phonetic_name.indexOf('ぢ') == 0 ||
                       value.full_phonetic_name.indexOf('づ') == 0 ||
                       value.full_phonetic_name.indexOf('で') == 0 ||
                       value.full_phonetic_name.indexOf('ど') == 0
            })
        },
        filterCustomerN: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('な') == 0 ||
                       value.full_phonetic_name.indexOf('に') == 0 ||
                       value.full_phonetic_name.indexOf('ぬ') == 0 ||
                       value.full_phonetic_name.indexOf('ね') == 0 ||
                       value.full_phonetic_name.indexOf('の') == 0
            })
        },
        filterCustomerH: function() {
            return this.customer.filter(function (value) {
                return value.full_phonetic_name.indexOf('は') == 0 ||
                       value.full_phonetic_name.indexOf('ひ') == 0 ||
                       value.full_phonetic_name.indexOf('ふ') == 0 ||
                       value.full_phonetic_name.indexOf('へ') == 0 ||
                       value.full_phonetic_name.indexOf('ほ') == 0 ||
                       value.full_phonetic_name.indexOf('ば') == 0 ||
                       value.full_phonetic_name.indexOf('び') == 0 ||
                       value.full_phonetic_name.indexOf('ぶ') == 0 ||
                       value.full_phonetic_name.indexOf('べ') == 0 ||
                       value.full_phonetic_name.indexOf('ぼ') == 0 ||
                       value.full_phonetic_name.indexOf('ぱ') == 0 ||
                       value.full_phonetic_name.indexOf('ぴ') == 0 ||
                       value.full_phonetic_name.indexOf('ぷ') == 0 ||
                       value.full_phonetic_name.indexOf('ぺ') == 0 ||
                       value.full_phonetic_name.indexOf('ぽ') == 0
            })
        },
        filterCustomerM: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('ま') == 0 ||
                       value.full_phonetic_name.indexOf('み') == 0 ||
                       value.full_phonetic_name.indexOf('む') == 0 ||
                       value.full_phonetic_name.indexOf('め') == 0 ||
                       value.full_phonetic_name.indexOf('も') == 0
            })
        },
        filterCustomerY: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('や') == 0 ||
                       value.full_phonetic_name.indexOf('ゆ') == 0 ||
                       value.full_phonetic_name.indexOf('よ') == 0
            })
        },
        filterCustomerR: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('ら') == 0 ||
                       value.full_phonetic_name.indexOf('り') == 0 ||
                       value.full_phonetic_name.indexOf('る') == 0 ||
                       value.full_phonetic_name.indexOf('れ') == 0 ||
                       value.full_phonetic_name.indexOf('ろ') == 0
            })
        },
        filterCustomerW: function() {
            return this.customers.filter(function (value) {
                return value.full_phonetic_name.indexOf('わ') == 0 ||
                       value.full_phonetic_name.indexOf('を') == 0 ||
                       value.full_phonetic_name.indexOf('ん') == 0
            })
        },
    },
    watch: {
        modalShow: function (val) {
            this.isShow = val
        }
    },
    methods: {
        onSelected: function (item) {
            this.$emit('selected', item)
        },
        onHide: function () {
            this.$emit('hide')
        }
    }
}
</script>