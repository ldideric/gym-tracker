<template>
	<div class="absolute left-6 bottom-28 flex mr-4">
		<button v-if="!confirmDelete" @click="confirmDeletion" class="mr-4 flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
			</svg>
		</button>
		<form v-if="confirmDelete" :action="deleteUrl" method="POST" class="flex">
			<input type="hidden" name="_token" :value="csrf">
			<input type="hidden" name="_method" value="DELETE">
			<button v-if="confirmDelete" @click="cancelDeletion" class="mr-4 flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
			<button type="submit" class="mr-4 flex items-center justify-center border-3 bg-slate-900 border-rose-600 hover:bg-rose-600 text-rose-600 hover:text-slate-900 w-12 h-12 rounded-full">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
				</svg>
			</button>
		</form>
	</div>
</template>

<script>
export default {
	props: ['deleteUrl', 'editUrl'],
	data() {
		return {
			confirmDelete: false,
			csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		};
	},
	methods: {
		confirmDeletion() {
			this.confirmDelete = true;
		},
		cancelDeletion() {
			this.confirmDelete = false;
		},
	},
};
</script>
