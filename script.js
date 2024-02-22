console.log(Vue);
const endpoint = 'http://localhost/boolean/php-todo-list-json/api/index.php';
const { createApp } = Vue;

const app = createApp({
    name: 'PHP ToDo List JSON',
    data: () => ({
        tasks: [],
        newTaskText: ''
    }),
    methods: {
        addTask() {
            const newTask = {
                id: new Date().toISOString(),
                text: this.newTaskText,
                done: false
            }
            const data = { 'new-task': newTask };
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(endpoint, data, config).then(res => {
                this.tasks = res.data;
                this.newTaskText = '';
            })
        },
        deleteTask(taskId) {
            const targetTask = this.tasks.find(task => task.id === taskId);
            const data = { 'target-task': targetTask };
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(endpoint, data, config).then(res => {
                this.tasks = res.data;
            })
            console.log(targetTask);
        }
    },
    created() {
        axios.get(endpoint).then(res => {
            this.tasks = res.data;
        }).catch()
    }
})

app.mount('#root');