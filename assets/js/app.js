const { createApp } = Vue;

createApp({
    data() {
        return {
            tasks: []
        }
    },
    mounted() {
        this.loadTasks();
    },
    methods: {
        async loadTasks() {
            const response = await fetch('api/tasks.php');
            this.tasks = await response.json();
        },
        async toggleTask(task) {
            task.done = !task.done;
            await this.saveTasks();
        },
        async saveTasks() {
            await fetch('api/tasks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(this.tasks)
            });
        }
    }
}).mount('#app');