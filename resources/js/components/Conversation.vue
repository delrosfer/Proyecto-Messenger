<template>
	<div class="conversation">
		<h1> {{ contact ? contact.name : 'Selecciona un contacto' }} </h1>
		<MessagesFeed :contact="contact" :messages="messages"/>
		<MessageComposer @send="sendMessage"/>
	</div>
</template>

<script>
	import MessagesFeed from './MessagesFeed';
	import MessageComposer from './MessageComposer';

	export default {
		props: {
			contact: {
				type: Object,
				default: null
			},
			messages: {
				type: Array,
				default: []
			}
		},
		methods: {
			sendMessage(text) {
				if (!this.contact) {
					return;
				}

				axios.post('/conversation/send', {
					contact_id: this.contact.id,
					text: text
				}).then((response) => {
					this.$emit('new', response.data);
				})
			}
		},
		components: {MessagesFeed, MessageComposer}
	}
</script>

<style lang="scss" scoped>
	.conversation {
		flex: 6;
		display: flex;
		flex-direction: column;
		justify-content: space-between;

		h1 {
			font-size: 22px;
			padding: 10px;
			margin: 0;
			border-bottom: 1px dashed lightgray;
			background: #2EFE2E;
			font-style:italic;
			font-family: times, serif;
			font-color: white;
		}
	}
</style>