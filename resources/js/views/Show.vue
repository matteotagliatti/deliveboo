<template>
    <h1>Show Vue</h1>
</template>

<script>
import axios from "axios";

export default {
    name: "App",
    components: {},
    data() {
        return {
            restaurant: null,
        };
    },
    mounted() {
        console.log(id);
        /* axios
            .get(`/api/users/${id}`)
            .then((response) => {
                this.restaurant = response.data;
                console.log(this.restaurant);
            })
            .catch((error) => {
                console.log(error);
            }); */
    },
};
</script>

<style scoped></style>
