<template>
	<div class="container w-auto mx-5 mb-24 rounded-lg shadow-md">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
			<div v-for="(exercise, index) in exercises" :key="index" class="bg-slate-900 rounded-lg p-4 transition-max-height duration-500 ease-in-out overflow-hidden" :style="activeIndexes.includes(index) ? 'max-height: 300px;' : 'max-height: 60px;'">
				<button class="flex flex-col w-full text-rose-600" @click="toggle(index)">

					<div class="flex justify-between items-center w-full">
						<p class="text-lg font-bold text-white">
							{{ exercise.name }}
						</p>
						<svg :class="{'rotate-180': activeIndexes.includes(index)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 transition-transform duration-500 ease-in-out">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</div>

					<div class="text-left">
						<transition name="fade" mode="out-in">
							<p v-if="activeIndexes.includes(index)" class="text-sm text-white mt-2 transition-opacity duration-500 ease-in-out">
								{{ exercise.description }}
							</p>
						</transition>
					</div>

				</button>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		exercises: {
			type: Array,
			required: true
		}
	},
	data() {
		return {
			activeIndexes: []
		}
	},
	methods: {
		toggle(index) {
			if (this.activeIndexes.includes(index)) {
				this.activeIndexes = this.activeIndexes.filter(i => i !== index);
			} else {
				this.activeIndexes.push(index);
			}
		}
	}
}
</script>

<style scoped>
	.rotate-180 {
		transform: rotate(180deg);
	}

	.fade-enter-active, .fade-leave-active {
		transition: opacity 0.5s;
	}

	.fade-enter-from, .fade-leave-to {
		opacity: 0;
	}
</style>
