<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("peripherals-format")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueFormatMouse()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.format"
                    class="form-checkbox size-4"
                    @change="updateMouseFormat"
                />
                <span class="ml-2" v-if="option.format === 'righthand'">{{
                    t(`peripherals-format-option.${option.format}`)
                }}</span>
                <span class="ml-2" v-else>{{ option.format }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("peripherals-interface")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueInterface()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.interface"
                    class="form-checkbox size-4"
                    @change="updateMouseInterface"
                />
                <span class="ml-2">{{ option.interface }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("peripherals-dpi")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueDPI()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.dpi"
                    class="form-checkbox size-4"
                    @change="updateMouseDPI"
                />
                <span class="ml-2">{{ option.dpi + " DPI" }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("peripherals-response")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueResponseTime()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.response_time"
                    class="form-checkbox size-4"
                    @change="updateMouseResponseTime"
                />
                <span class="ml-2">{{ option.response_time + " ms" }}</span>
            </label>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const props = defineProps({
    mouse: Array,
    mice_format: Array,
    mice_interface: Array,
    mice_dpi: Array,
    mice_response_time: Array,
});

const emit = defineEmits([
    "update:mice_format",
    "update:mice_interface",
    "update:mice_dpi",
    "update:mice_response_time",
]);

function updateMouseFormat(event) {
    const value = event.target.value;
    let updated = [...props.mice_format];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:mice_format", updated);
}

function updateMouseInterface(event) {
    const value = event.target.value;
    let updated = [...props.mice_interface];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:mice_interface", updated);
}

function updateMouseDPI(event) {
    const value = event.target.value;
    let updated = [...props.mice_dpi];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:mice_dpi", updated);
}

function updateMouseResponseTime(event) {
    const value = event.target.value;
    let updated = [...props.mice_response_time];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:mice_response_time", updated);
}

const uniqueFormatMouse = () => {
    const sizeRAM = new Set();
    return props.mouse.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
            sizeRAM.add(ram.format);
            return true;
        }
        return false;
    });
};
const uniqueInterface = () => {
    const sizeRAM = new Set();
    return props.mouse.filter((ram) => {
        if (!sizeRAM.has(ram.interface)) {
            sizeRAM.add(ram.interface);
            return true;
        }
        return false;
    });
};
const uniqueDPI = () => {
    const sizeRAM = new Set();
    return props.mouse.filter((ram) => {
        if (!sizeRAM.has(ram.dpi)) {
            sizeRAM.add(ram.dpi);
            return true;
        }
        return false;
    });
};
const uniqueResponseTime = () => {
    const sizeRAM = new Set();
    return props.mouse.filter((ram) => {
        if (!sizeRAM.has(ram.response_time)) {
            sizeRAM.add(ram.response_time);
            return true;
        }
        return false;
    });
};
</script>
