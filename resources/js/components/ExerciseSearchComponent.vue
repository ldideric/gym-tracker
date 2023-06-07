<template>
	<div class="mx-auto max-w-lg p-6">
		<div class="mt-4">
			<label class="block text-gray-700 text-sm font-bold mb-2">Selected Exercises:</label>
			<ul>
				<li v-for="exercise in selectedExercises" :key="exercise.id" class="bg-blue-100 p-2 rounded mt-1 flex justify-between items-center">
					{{ exercise.name }}
					<button type="button" @click="removeExercise(exercise)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
				</li>
			</ul>
		</div>
		<div class="mt-4">
			<input type="text" name="search" id="search" v-model="search" @input="searchExercises" @keydown.enter.prevent placeholder="Search Exercises" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
			<div v-for="exercise in exercises" :key="exercise.id" @click="addExercise(exercise)" class="mt-2 cursor-pointer hover:bg-blue-100 p-2 rounded">
				{{ exercise.name }}
			</div>
		</div>
		<div v-if="error" class="mb-4 text-red-500">
			{{ error }}
		</div>
	</div>
</template>

<script>
import axios from 'axios';
import _ from 'lodash';

export default {
	data() {
		return {
			search: null,
			exercises: [],
			selectedExercises: [],
			error: null,
		};
	},
	methods: {
		searchExercises: _.debounce(function () {
			if(this.search.length < 3) {
				this.exercises = [];
				return;
			}
			axios.post('/api/exercises', { search: this.search })
				.then(response => {
					this.exercises = response.data.slice(0, 10); // limit results to 10
				})
				.catch(() => {
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
};
</script>
