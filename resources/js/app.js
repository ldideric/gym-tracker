import './bootstrap';
import { createApp } from 'vue';
import ExerciseSearchComponent from './components/ExerciseSearchComponent.vue';

const app = createApp({});

app.component('exercise-search-component', ExerciseSearchComponent);

app.mount('#app');
