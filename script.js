console.log(Vue);
const endpoint = 'http://localhost/boolean/php-todo-list-json/api/index.php';
const { createApp } = Vue;

const app = createApp({
    name: 'PHP ToDo List JSON',
    data: () => ({
        tasks: []
    }),
    created() {
        axios.get(endpoint).then(res => {
            this.tasks = res.data;
        }).catch()
    }
})

app.mount('#root');