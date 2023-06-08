import './bootstrap';
import { createApp } from 'vue';
import ExerciseSearchComponent from './components/ExerciseSearchComponent.vue';
import DeleteExerciseComponent from './components/DeleteExerciseComponent.vue';

const app = createApp({});

app.component('exercise-search-component', ExerciseSearchComponent);
app.component('delete-exercise-component', DeleteExerciseComponent);

app.mount('#app');
