new Vue({
    el: '#app',
    data() {
        return {
            email: '',
            dob: '',
            new_password: '',
            status: false,
            msg: ''
        }
    },

    mounted() {        
    },
    methods: {
        forgot () {            
            axios
                .post('http://localhost:8080/api/chgpwd', {email: this.email, dob: this.dob, new_password: this.new_password})
                .then(response => (
                    this.status = response.data.status,
                    (this.status == true) ? window.location = "./login.html" : this.msg = 'Password change failed!'                                     
                    )                    
                )             
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})