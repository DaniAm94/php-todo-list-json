console.log(Vue);
const endpoint = 'http://localhost/boolean/php-todo-list-json/api/';
const { createApp } = Vue;

const app = createApp({
    name: 'PHP ToDo List JSON',
    data: () => ({
        tasks: [],
        newTaskText: ''
    }),
    methods: {
        addTask() {
            const data = { 'new-task-text': this.newTaskText };
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(endpoint, data, config).then(res => {
                this.tasks = res.data;
                this.newTaskText = '';
            })
        },
        toggleTask(id) {
            // const data = { id };
            // const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            // axios.post(`${endpoint}toggle/`, data, config).then(res => {
            //     this.tasks = res.data;
            const data = new FormData();
            data.append('id', id);
            axios.post(`${endpoint}toggle/`, data).then(res => {
                this.tasks = res.data;
            })
        },
        deleteTask(id) {
            const data = new FormData();
            data.append('id', id);
            axios.post(`${endpoint}delete/`, data).then(res => {
                this.tasks = res.data;
            })
        }
    },
    created() {
        axios.get(endpoint).then(res => {
            this.tasks = res.data;
        }).catch()
    }
})

app.mount('#root');