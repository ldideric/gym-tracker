import './bootstrap';
import { createApp } from 'vue';
import ExerciseSearchComponent from './components/ExerciseSearchComponent.vue';
import DeleteExerciseComponent from './components/DeleteExerciseComponent.vue';
import DropdownDetailsComponent from './components/DropdownDetailsComponent.vue';

const app = createApp({});

app.component('exercise-search-component', ExerciseSearchComponent);
app.component('delete-exercise-component', DeleteExerciseComponent);
app.component('dropdown-details-component', DropdownDetailsComponent);

app.mount('#app');
