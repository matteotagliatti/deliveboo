<template>
    <div v-if="restaurant">
        <div id="hero" class="position-relative bg-dark">
            <div
                id="text-hero"
                class="text-center my-py-13 text-white position-absolute"
            >
                <h1>{{ restaurant.nome }}</h1>
                <p>{{ restaurant.indirizzo }}</p>
            </div>
        </div>
        <div class="row py-5" id="menu">
            <!-- Menu -->
            <div class="col-8">
                <div class="container">
                    <h2 class="mb-4">Menu</h2>
                    <div class="items">
                        <div
                            class="item p-4"
                            v-for="(dish, index) in restaurant.dishes"
                            :key="index"
                            :class="
                                dish.visibilita == 0 ? 'my-not-visible' : ''
                            "
                        >
                            <h3>{{ dish.nome }}</h3>
                            <p>Descrizione: {{ dish.descrizione }}</p>
                            <p>Ingredienti: {{ dish.ingredienti }}</p>
                            <p>{{ dish.prezzo }} €</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkout -->
            <div class="col-4">
                <div class="container">
                    <h2>Checkout</h2>
                </div>
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
            restaurant: null,
        };
    },
    mounted() {
        const url = window.location.href;
        const id = url.substring(url.lastIndexOf("/") + 1);

        axios
            .get(`/api/users/${id}`)
            .then((response) => {
                this.restaurant = response.data;
                console.log(this.restaurant);
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>

<style scoped></style>
