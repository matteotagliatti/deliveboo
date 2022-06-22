<template>
    <div>
        <div id="hero" class="position-relative bg-dark">
            <div
                id="text-hero"
                class="text-center my-py-13 text-white position-absolute"
            >
                <h1>Cerca</h1>
                <select name="types" id="types" @change="sendTypes">
                    <option>-- Scegli la tipologia --</option>
                    <option
                        v-for="(type, index) in types"
                        :value="type.id"
                        :key="index"
                    >
                        {{ type.nome }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "App",
    components: {},
    data() {
        return {
            types: [],
            type: null,
        };
    },
    methods: {
        sendTypes(e) {
            console.log(e.target.value);
            /* axios
                .post("/api/types", {
                    id: e.target.value,
                })
                .then((response) => {
                    this.type = response.data;
                }); */
        },
    },
    created() {
        axios
            .get(`/api/types`)
            .then((response) => {
                this.types = response.data;
                console.log(this.types);
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>

<style scoped></style>
