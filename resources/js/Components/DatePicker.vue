<script setup>
import { ref, watch, watchEffect } from "vue";
import moment from "moment";

const props = defineProps({
    label: {
        type: String,
        default: "label",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    placeholder: String,
    minDate: {
        default: moment().subtract(1, "year"),
    },
    dates: {
        default: moment().format("MM-YYYY"),
    },
    modelType: {
        type: Text,
        default: "M-yyyy",
    },
    maxDate: {
        type: String,
        default: moment().format("MM-YYYY"),
    },
});

const modelValue = ref();

const emit = defineEmits(["selectDate"]);

watch(modelValue, (newModelValue) => emit("selectDate", newModelValue));
watchEffect(() =>
    props.dates != null ? (modelValue.value = props.dates) : null
);
</script>
<template>
    <div class="grid">
        <label :for="id" class="uppercase ps-1 text-[13px] font-medium">
            {{ label }}
        </label>
        <VueDatePicker
            id="datePicker"
            v-model="modelValue"
            month-picker
            timezone="America/Mexico_City"
            :model-type="modelType"
            :min-date="props.minDate"
            :max-date="maxDate"
            :enable-time-picker="false"
            locale="es"
            class="datePicker drop-shadow-[1px_1px_2px_#B5B5B5]"
            :disabled="disabled"
            position="left"
            :teleport="true"
            :placeholder="placeholder"
        />
    </div>
</template>
<style scoped>
.datePicker {
    --dp-font-size: 15px;
    --dp-background-color: #f4f5f9;
    --dp-text-color: #989fb5;
    --dp-primary-color: #2cbee1;
    --dp-border-color: #f4f5f9;
    --dp-border-color-hover: #f4f5f9;
    --dp-icon-color: #989fb5;
    --dp-hover-text-color: #212121;
    text-transform: capitalize;
    --dp-border-radius: 8px;
    --dp-font-family: "Monserrat", sans-serif;
    --dp-input-padding: 4px 4px 4px 10px;
    --dp-disabled-color: #f2f2f2;
}
</style>
