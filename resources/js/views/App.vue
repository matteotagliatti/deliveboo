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
        <!-- cta -->
        <div class="row py-5 mb-5">
            <div class="col-12">
                <div id="cta" class="container py-5">
                    <div class="overlay"></div>
                    <div id="cta-text" class="text-white d-flex justify-content-center flex-column ml-4">
                        <h3>Hai un ristorante?</h3>
                        <a class="btn btn-warning w-50">Registrati</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ordina ora -->
        <!-- <div class="row py-5">
            <div class="col-12">
                <div id="order-now" class="container py-5">
                    <div class="row">
                        <div class="col-6">
                            <div></div>
                        </div>

                        <div class="col-6">

                        </div>
                </div>
            </div>
        </div> -->

        <div id="order-now" class="container py-5">
            <div class="row h-100 py-5">
                <div class="col-7">
                    <div class="row h-100">
                        <div class="col-6 d-flex flex-column justify-content-between">
                            <div class="card mb-3 p-2">
                                <img src="/img/how_1.svg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">Ordina facilmente</h5>
                                    <p class="card-text">Ordina i tuoi piatti preferiti in modo semplice e veloce grazie alla nostra app.</p>
                                </div>
                            </div>

                            <div class="card p-2">
                                <img src="/img/how_2.svg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">Consegne veloci</h5>
                                    <p class="card-text">Ricevi i tuoi piatti direttamente a casa tua in tutta sicurezza.</p>
                                </div>
                            </div>
                    
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-center">
                            <div class="card p-2">
                                <img src="/img/how_3.svg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">Goditi il cibo</h5>
                                    <p class="card-text">Condividi i piatti con chi vuoi e dove vuoi. Con amici e famiglia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    IGRID
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
