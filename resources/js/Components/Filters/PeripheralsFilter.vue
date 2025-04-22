<template>
    <div v-if="!keyboardPage && !monitorPage">
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
                    <span
                        class="ml-2"
                        v-if="
                            option.format === 'righthand' ||
                            option.format === 'lefthand'
                        "
                        >{{
                            t(`peripherals-format-option.${option.format}`)
                        }}</span
                    >
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
    </div>
    <div v-if="!mousePage && !monitorPage">
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-keyboard-interface")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueKeyboardInterface()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.interface"
                        class="form-checkbox size-4"
                        @change="updateKeyboardInterface"
                    />
                    <span class="ml-2">{{ option.interface }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-keyboard-type")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueKeyboardType()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type"
                        class="form-checkbox size-4"
                        @change="updateKeyboardType"
                    />
                    <span
                        class="ml-2"
                        v-if="
                            option.type === 'mechanical' ||
                            option.type === 'membrane'
                        "
                        >{{
                            t(`peripherals-keyboard-type-option.${option.type}`)
                        }}</span
                    >
                    <span class="ml-2" v-else>{{ option.type }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("peripherals-keyboard-light")
            }}</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="true"
                        class="form-checkbox size-4"
                        @change="updateKeyboardLight"
                    />
                    <span class="ml-2">{{ t("yes") }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("peripherals-keyboard-numpad")
            }}</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="true"
                        class="form-checkbox size-4"
                        @change="updateKeyboardNumpad"
                    />
                    <span class="ml-2">{{ t("yes") }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-keyboard-layout")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueKeyboardLayout()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.layout"
                        class="form-checkbox size-4"
                        @change="updateKeyboardLayout"
                    />
                    <span class="ml-2">{{ option.layout }}</span>
                </label>
            </div>
        </div>
    </div>
    <div v-if="!keyboardPage && !mousePage">
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("peripherals-monitor-inclination")
            }}</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="true"
                        class="form-checkbox size-4"
                        @change="updateMonitorInclination"
                    />
                    <span class="ml-2">{{ t("yes") }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-monitor-format")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFormatMonitor()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.format"
                        class="form-checkbox size-4"
                        @change="updateMonitorFormat"
                    />
                    <span
                        class="ml-2"
                        v-if="
                            option.format === 'curve' ||
                            option.format === 'flat'
                        "
                        >{{
                            t(
                                `peripherals-monitor-format-option.${option.format}`
                            )
                        }}</span
                    >
                    <span class="ml-2" v-else>{{ option.format }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-monitor-ratio")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueMonitorRatio()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.ratio"
                        class="form-checkbox size-4"
                        @change="updateMonitorRatio"
                    />
                    <span class="ml-2">{{ option.ratio }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-monitor-resolution")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueMonitorResolution()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.resolution"
                        class="form-checkbox size-4"
                        @change="updateMonitorResolution"
                    />
                    <span class="ml-2">{{ option.resolution }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-monitor-inches")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueMonitorInches()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.inches"
                        class="form-checkbox size-4"
                        @change="updateMonitorInches"
                    />
                    <span class="ml-2">{{ option.inches + "''" }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-monitor-hz")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueMonitorHZ()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.refresh_rate"
                        class="form-checkbox size-4"
                        @change="updateMonitorHZ"
                    />
                    <span class="ml-2">{{ option.refresh_rate + " Hz" }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-monitor-response")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueMS()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.response_time"
                        class="form-checkbox size-4"
                        @change="updateMonitorMS"
                    />
                    <span class="ml-2">{{ option.response_time + " ms" }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("peripherals-monitor-panel")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniquePanelType()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type_panel"
                        class="form-checkbox size-4"
                        @change="updateMonitorPanel"
                    />
                    <span class="ml-2">{{ option.type_panel }}</span>
                </label>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from "vue-i18n";
import { usePage } from "@inertiajs/vue3";
const { t } = useI18n();

const page = usePage().url;

const keyboardPage = page.includes("/peripherals/keyboards");
const mousePage = page.includes("/peripherals/mouses");
const monitorPage = page.includes("/peripherals/monitors");

const props = defineProps({
    mouse: Array,
    keyboard: Array,
    monitor: Array,

    mice_format: Array,
    mice_interface: Array,
    mice_dpi: Array,
    mice_response_time: Array,

    keyboard_interface: Array,
    keyboard_type: Array,
    keyboard_light: Array,
    keyboard_numpad: Array,
    keyboard_layout: Array,

    monitor_inclination: Array,
    monitor_format: Array,
    monitor_ratio: Array,
    monitor_resolution: Array,
    monitor_inches: Array,
    monitor_refresh_rate: Array,
    monitor_response_time: Array,
    monitor_type_panel: Array,
});

const emit = defineEmits([
    "update:mice_format",
    "update:mice_interface",
    "update:mice_dpi",
    "update:mice_response_time",
    "update:keyboard_interface",
    "update:keyboard_type",
    "update:keyboard_light",
    "update:keyboard_numpad",
    "update:keyboard_layout",
    "update:monitor_inclination",
    "update:monitor_format",
    "update:monitor_ratio",
    "update:monitor_resolution",
    "update:monitor_inches",
    "update:monitor_refresh_rate",
    "update:monitor_response_time",
    "update:monitor_type_panel",
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

function updateKeyboardInterface(event) {
    const value = event.target.value;
    let updated = [...props.keyboard_interface];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:keyboard_interface", updated);
}

function updateKeyboardType(event) {
    const value = event.target.value;
    let updated = [...props.keyboard_type];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:keyboard_type", updated);
}

function updateKeyboardLight(event) {
    const value = event.target.value;
    let updated = [...props.keyboard_light];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:keyboard_light", updated);
}
function updateKeyboardNumpad(event) {
    const value = event.target.value;
    let updated = [...props.keyboard_numpad];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:keyboard_numpad", updated);
}

function updateKeyboardLayout(event) {
    const value = event.target.value;
    let updated = [...props.keyboard_layout];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:keyboard_layout", updated);
}

function updateMonitorInclination(event) {
    const value = event.target.value;
    let updated = [...props.monitor_inclination];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_inclination", updated);
}

function updateMonitorFormat(event) {
    const value = event.target.value;
    let updated = [...props.monitor_format];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_format", updated);
}

function updateMonitorRatio(event) {
    const value = event.target.value;
    let updated = [...props.monitor_ratio];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_ratio", updated);
}

function updateMonitorResolution(event) {
    const value = event.target.value;
    let updated = [...props.monitor_resolution];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_resolution", updated);
}

function updateMonitorInches(event) {
    const value = event.target.value;
    let updated = [...props.monitor_inches];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_inches", updated);
}

function updateMonitorHZ(event) {
    const value = event.target.value;
    let updated = [...props.monitor_refresh_rate];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_refresh_rate", updated);
}

function updateMonitorMS(event) {
    const value = event.target.value;
    let updated = [...props.monitor_response_time];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_response_time", updated);
}

function updateMonitorPanel(event) {
    const value = event.target.value;
    let updated = [...props.monitor_type_panel];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:monitor_type_panel", updated);
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
const uniqueKeyboardInterface = () => {
    const sizeRAM = new Set();
    return props.keyboard.filter((ram) => {
        if (!sizeRAM.has(ram.interface)) {
            sizeRAM.add(ram.interface);
            return true;
        }
        return false;
    });
};
const uniqueKeyboardType = () => {
    const sizeRAM = new Set();
    return props.keyboard.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
            sizeRAM.add(ram.type);
            return true;
        }
        return false;
    });
};
const uniqueKeyboardLayout = () => {
    const sizeRAM = new Set();
    return props.keyboard.filter((ram) => {
        if (!sizeRAM.has(ram.layout)) {
            sizeRAM.add(ram.layout);
            return true;
        }
        return false;
    });
};
const uniqueFormatMonitor = () => {
    const sizeRAM = new Set();
    return props.monitor.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
            sizeRAM.add(ram.format);
            return true;
        }
        return false;
    });
};
const uniqueMonitorRatio = () => {
    const sizeRAM = new Set();
    return props.monitor.filter((ram) => {
        if (!sizeRAM.has(ram.ratio)) {
            sizeRAM.add(ram.ratio);
            return true;
        }
        return false;
    });
};
const uniqueMonitorResolution = () => {
    const sizeRAM = new Set();
    return props.monitor.filter((ram) => {
        if (!sizeRAM.has(ram.resolution)) {
            sizeRAM.add(ram.resolution);
            return true;
        }
        return false;
    });
};
const uniqueMonitorInches = () => {
    const sizeRAM = new Set();
    return props.monitor.filter((ram) => {
        if (!sizeRAM.has(ram.inches)) {
            sizeRAM.add(ram.inches);
            return true;
        }
        return false;
    });
};
const uniqueMonitorHZ = () => {
    const sizeRAM = new Set();
    return props.monitor.filter((ram) => {
        if (!sizeRAM.has(ram.refresh_rate)) {
            sizeRAM.add(ram.refresh_rate);
            return true;
        }
        return false;
    });
};
const uniqueMS = () => {
    const sizeRAM = new Set();
    return props.monitor.filter((ram) => {
        if (!sizeRAM.has(ram.response_time)) {
            sizeRAM.add(ram.response_time);
            return true;
        }
        return false;
    });
};
const uniquePanelType = () => {
    const sizeRAM = new Set();
    return props.monitor.filter((ram) => {
        if (!sizeRAM.has(ram.type_panel)) {
            sizeRAM.add(ram.type_panel);
            return true;
        }
        return false;
    });
};
</script>
