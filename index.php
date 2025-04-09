<!DOCTYPE html>
<html>
<head>
    <title>Менеджер задач</title>
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>
    <div id="app">
        <h1>Задачи</h1>
        <div v-for="task in tasks" :key="task.id">
            <label>
                <input 
                    type="checkbox" 
                    v-model="task.done"
                    @change="saveTasks"
                >
                <span :class="{ 'done': task.done }">{{ task.title }}</span>
            </label>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>