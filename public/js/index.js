new Vue({
    el: '#app',
    data: {
        list: [1,2,3,4,5,6,7],
        topStatus: ''
    },
    methods: {
        handleClick: function() {
            this.$toast('Hello world!')
        },
        goBack: function() {
            window.history.go(-1);
        },
        loadTop: function () {
            window.location.reload();
        },
    }
})
