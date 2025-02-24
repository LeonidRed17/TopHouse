<template>

    <p class="mb-2">По дате</p>
    <button @click="sendButtonValue('newer')"
        :class="{ 'btn-primary': activeButton !== 'newer', 'btn-dark-primary': activeButton === 'newer' }"
        class="btn me-1">
        Новее
    </button>
    <button @click="sendButtonValue('older')"
        :class="{ 'btn-primary': activeButton !== 'older', 'btn-dark-primary': activeButton === 'older' }"
        class="btn me-1">
        Старее
    </button>
</template>

<script>

export default {
    name: "DateFilter",
    emits:['setActiveButton'],
    components: {
    },
    data() {
        return {
            activeButton: null,
        };
    },
    methods: {
        sendButtonValue(button) {
            this.activeButton = button;
            this.$emit('setActiveButton', this.activeButton);
        },
        reset() {
            this.activeButton = null;
        }
    },
};
</script>

<style>
.btn-dark-primary {
    background-color: #0a48a6 !important;
    border-color: #0d6efd !important;
    color: #fff !important;
}
</style>
