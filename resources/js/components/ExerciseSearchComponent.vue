<template>
	<div>
		<label class="text-rose-600 text-sm font-bold mb-2">Exercises</label>
		<ul class="mb-3">
			<li v-if="selectedExercises.length === 0" class="bg-slate-700 p-2 rounded mb-1 text-white">No exercises selected.</li>
			<li v-for="exercise in selectedExercises" :key="exercise.id" class="bg-slate-700 p-2 rounded mb-1 flex justify-between items-center text-white">
				{{ exercise.name }}
				<button type="button" @click="removeExercise(exercise)" class="text-rose-600 bg-slate-900 hover:bg-rose-600 hover:text-slate-900 font-bold p-1 rounded-lg">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
					</svg>
				</button>
				<input type="hidden" name="selectedExercises[]" :value="exercise.id">
			</li>
		</ul>

		<div class="mb-4 relative">
			<ul>
				<label v-if="exercises.length !== 0" class="text-rose-600 text-sm font-bold mb-2">Results</label>
				<li v-for="exercise in exercises" :key="exercise.id" class="bg-slate-700 p-2 rounded mb-1 flex justify-between items-center text-white">
					{{ exercise.name }}
					<button type="button" @click="addExercise(exercise)" class="text-rose-600 bg-slate-900 hover:bg-rose-600 hover:text-slate-900 font-bold p-1 rounded-lg">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
					</button>
				</li>
			</ul>

			<label class="text-rose-600 text-sm font-bold mb-2">Search</label>
			<input type="text" name="search" id="search" v-model="search" @input="searchExercises" @keydown.enter.prevent placeholder="Search Exercises" class="shadow appearance-none border rounded w-full py-2 px-3 pr-10 text-white bg-slate-700 leading-tight focus:outline-none focus:shadow-outline">
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
props: ['initSelectedExercises'],
data() {
	return {
		search: null,
		exercises: [],
		selectedExercises: this.initSelectedExercises || [],
		error: null,
	};
},
methods: {
	searchExercises: _.debounce(function () {
		if(this.search.length < 3) {
			this.exercises = [];
			return;
		}
		axios.post('/api/exercises', { search: this.search, exclude: this.selectedExercises.map(item => item.id) })
			.then(response => {
				this.exercises = response.data;
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
		this.exercises = (this.exercises) ? this.exercises.concat(exercise) : [exercise];
	},
},
};
</script>
