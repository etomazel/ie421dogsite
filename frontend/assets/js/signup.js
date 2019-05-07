new Vue({
    el: '#app',
    data() {
        return {
            username: '',
            password: '',
            email: '',
            first_name:'',
            middle_name:'',
            last_name:'',
            dob:'',
            status: false,
            msg: ''
        }
    },

    mounted() {        
    },
    methods: {
        signup () {            
            axios
                .post('http://localhost:8080/api/user', {username: this.username, password: this.password, 
                email: this.email, first_name: this.first_name, middle_name: this.middle_name, last_name: this.last_name, dob: this.dob})
                .then(response => (
                    this.status = response.data.status,
                    (this.status == true) ? window.location = "./login.html" : this.msg = 'Sign-in failed!'                                     
                    )                    
                )             
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})