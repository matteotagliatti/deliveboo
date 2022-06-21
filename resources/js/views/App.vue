<template>
    <div>
        <!-- Hero -->
        <div class="bg-dark row">
            <div class="col-12 d-flex justify-content-center">
                <div class="container">
                    <div class="text-center my-py-13 text-white">
                        <h1>Cerca i tuoi cibi preferiti</h1>
                        <a class="btn btn-primary" href="#"
                            >Tutti i ristoranti</a
                        >
                    </div>
                </div>
            </div>
        </div>
        <!-- Ristoranti -->
        <div class="row">
            <div class="col-12">
                <div class="container py-5">
                    <h2 class="text-center pb-3">I migliori ristoranti</h2>
                    <div class="my-grid">
                        <a
                            class="my-grid-element d-flex"
                            v-for="(restaurant, index) in firstRestaurants"
                            :key="index"
                        >
                            <img
                                :src="restaurant.immagine"
                                :alt="restaurant.nome"
                            />
                            <div class="p-4">
                                <h3>{{ restaurant.nome }}</h3>
                                <p>
                                    Indirizzo:
                                    <strong>{{ restaurant.indirizzo }}</strong>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
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
            restaurants: [],
        };
    },
    mounted() {
        axios
            .get("/api/users")
            .then((response) => {
                this.restaurants = response.data;
                console.log(this.restaurants);
            })
            .catch((error) => {
                console.log(error);
            });
    },
    computed: {
        firstRestaurants() {
            return this.restaurants.slice(0, 4);
        },
    },
};
</script>

<style scoped></style>
