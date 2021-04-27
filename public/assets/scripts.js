new Vue({
    el: "#app",

    data: {
        skills: [
            'Laravel',
            'Codeigniter',
            'Ajax',
            'VUE JS',
            'MySQL',
            'API'
        ],

        developer: {
            name: '',
            email: '',
            gender: '',
        },
        developerSkills: [],
        image: null,

        editId: null,

        developers: [],

        isDisabled: false
    },

    created() {
        this.getDevelopers();
    },

    methods: {
        getDevelopers() {
            axios.get('/api/get-developers')
            .then(res => {
                this.developers = res.data.developers;
            });
        },

        onChangeImage(e) {
            if (e.target.files.length > 0) {
                this.image = e.target.files[0];
            }
        },

        async saveDeveloperInfo() {
            if (this.developer.name == '') {
                alert('The name field is required');
            } else if (this.developer.email == '') {
                alert('The email field is required');
            } else if (this.developer.gender == '') {
                alert('The gender field is required');
            } else if (this.developerSkills.length == 0) {
                alert('Please choose at least one skill');
            } else {

                this.isDisabled = true;

                let fd = new FormData();
                Object.keys(this.developer).forEach(k => fd.append(k, this.developer[k]));
                this.developerSkills.forEach(skill => fd.append('skills[]', skill));
                if (this.image != null) fd.append('image', this.image);

                let url = '/api/add-developer';

                if (this.editId != null) {
                    fd.append('id', this.editId);
                    fd.append('_method', 'put');

                    url = '/api/update-developer';
                }

                await axios.post(url, fd)
                    .then((res) => {
                        alert(res.data.message);
                        this.resetForm();
                        this.getDevelopers();
                    })
                    .catch((err) => {
                        alert(err.response.data.message);
                    });

                this.isDisabled = false;
            }
        },

        editDeveloper(dev) {
            this.editId = dev.id;
            Object.keys(this.developer).forEach(k => this.developer[k] = dev[k]);
            this.developerSkills = dev.skills != '' ? dev.skills.split(',') : [];
        },

        deleteDeveloper(id) {
            if (!confirm('Are you sure ?')) return;

            axios.delete('/api/delete-developer/' + id)
            .then((res) => {
                alert(res.data.message);
                this.getDevelopers();
            })
            .catch((err) => {
                alert(err.response.data.message);
            });
        },

        resetForm() {
            Object.keys(this.developer).forEach(k => this.developer[k] = '');
            this.$refs.image.value = null;
            this.developerSkills = [];
            this.image = null;
            this.editId = null;
        },

        capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    }
})
