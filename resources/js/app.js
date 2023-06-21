import './bootstrap';
import { createApp } from 'vue';
import ExerciseSearchComponent from './components/ExerciseSearchComponent.vue';
import DeleteExerciseComponent from './components/DeleteExerciseComponent.vue';
import DropdownDetailsComponent from './components/DropdownDetailsComponent.vue';
import DropdownDetailsSessionComponent from './components/DropdownDetailsSessionComponent.vue';

const app = createApp({});

app.component('exercise-search-component', ExerciseSearchComponent);
app.component('delete-exercise-component', DeleteExerciseComponent);
app.component('dropdown-details-component', DropdownDetailsComponent);
app.component('dropdown-details-session-component', DropdownDetailsSessionComponent);

app.mount('#app');
