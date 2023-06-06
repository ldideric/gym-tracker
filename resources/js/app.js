import './bootstrap';
import Vue from 'vue';
import axios from 'axios';
import _ from 'lodash';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Vue = Vue;
window.axios = axios;

Vue.component('exercise-search', {
	data() {
		return {
			search: null,
			exercises: [],
			selectedExercises: [],
			error: null
		};
	},
	methods: {
		searchExercises: _.debounce(function () {
			axios.post('/api/exercises', { search: this.search })
				.then(response => {
					this.exercises = response.data;
				})
				.catch(error => {
					this.error = "Error occurred while searching.";
				});
		}, 500),
		addExercise(exercise) {
			this.selectedExercises.push(exercise);
			this.exercises = this.exercises.filter(item => item.id !== exercise.id);
		},
		removeExercise(exercise) {
			this.selectedExercises = this.selectedExercises.filter(item => item.id !== exercise.id);
			this.exercises.push(exercise);
		},
	},
});

const app = new Vue({
	el: '#app',
});
