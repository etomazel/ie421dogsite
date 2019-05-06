new Vue({
    el: '#app',
    data() {
        return {
            username: '',
            password: '',
            status: false,
            msg: ''
        }
    },

    mounted() {        
    },
    methods: {
        login () {            
            axios
                .post('http://localhost:8080/api/login', {username: this.username, password: this.password})
                .then(response => (
                    this.status = response.data.status,
                    (this.status == true) ? window.location = "./Profile.html" : this.msg = 'Login failed!'                                     
                    )                    
                )             
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})