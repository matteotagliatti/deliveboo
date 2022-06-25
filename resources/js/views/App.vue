<template>
    <div>
        <!-- Hero -->
        <div id="hero" class="position-relative">
            <video autoplay muted loop id="myVideo" class="position-absolute">
                <source src="/img/Tasty_pizza.mp4" type="video/mp4" />
            </video>
            <div
                id="text-hero"
                class="text-center my-py-13 text-white position-absolute"
            >
                <span class="d-block">Cerca i tuoi piatti preferiti</span>
                <a class="btn btn-sm gr-orange text-white rounded-lg" href="/ristoranti">Tutti i ristoranti</a>
            </div>
            <div class="custom-shape-divider-bottom-1655826606">
                <svg
                    data-name="Layer 1"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120"
                    preserveAspectRatio="none"
                >
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        opacity=".25"
                        class="shape-fill"
                    ></path>
                    <path
                        d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                        opacity=".5"
                        class="shape-fill"
                    ></path>
                    <path
                        d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                        class="shape-fill"
                    ></path>
                </svg>
            </div>
        </div>
        <!-- Ristoranti -->
        <div class="row">
            <div class="col-12">
                <div class="container py-5">
                    <h2 class="text-center pb-3">I migliori ristoranti</h2>
                    <div class="my-grid">
                        <a
                            :href="restaurant.id"
                            class="my-grid-element d-flex"
                            v-for="(restaurant, index) in firstRestaurants"
                            :key="index"
                        >
                            <img
                                :src="restaurant.immagine"
                                :alt="restaurant.nome"
                            />
                            <div id="info-restaurant" class="p-4">
                                <span
                                    class="capitalize text-secondary"
                                    v-for="(type, index) in restaurant.types"
                                    :key="index"
                                >
                                    {{ type.nome }}
                                </span>
                                <h3 class="font-weight-bold">
                                    {{ restaurant.nome }}
                                </h3>
                                <h5 class="text-secondary font-weight-light">
                                    <strong
                                        ><i
                                            class="fa-solid fa-location-dot"
                                        ></i>
                                        {{ restaurant.indirizzo }}
                                    </strong>
                                </h5>
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
        <div class="row py-5">
            <div class="col-12">
                <div id="cta" class="container py-5">
                    <div class="overlay"></div>
                    <div
                        id="cta-text"
                        class="text-white d-flex justify-content-center flex-column ml-4"
                    >
                        <span>DELIVEBOO DELIVERY</span>
                        <h1>Hai un ristorante?</h1>
                        <h3 class="mb-4">Scopri tutti i vantaggi della<br>consegna a domicilio!</h3>
                        <a class="btn gr-orange text-white w-50">Registrati</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="order-now" class="container py-5">
            <div class="row h-100 py-5">
                <div class="col-12 col-md-7 mb-5">
                    <div class="row h-100">
                        <div
                            class="col-12 col-md-6 d-flex flex-column justify-content-between"
                        >
                            <div class="card mb-3 p-2">
                                <img
                                    src="/img/how_1.svg"
                                    class="card-img-top"
                                    alt="..."
                                />
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">
                                        Ordina facilmente
                                    </h5>
                                    <p class="card-text">
                                        Ordina i tuoi piatti preferiti in modo
                                        semplice e veloce grazie alla nostra
                                        app.
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-3 p-2">
                                <img
                                    src="/img/how_2.svg"
                                    class="card-img-top"
                                    alt="..."
                                />
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">
                                        Consegne veloci
                                    </h5>
                                    <p class="card-text">
                                        Ricevi i tuoi piatti direttamente a casa
                                        tua in tutta sicurezza.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex flex-column justify-content-center"
                        >
                            <div class="card mb-3 p-2">
                                <img
                                    src="/img/how_3.svg"
                                    class="card-img-top"
                                    alt="..."
                                />
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold">
                                        Goditi il cibo
                                    </h5>
                                    <p class="card-text">
                                        Condividi i piatti con chi vuoi e dove
                                        vuoi. Con amici e famiglia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-12 col-md-4 offset-md-1 pt-3 d-flex flex-column justify-content-center"
                >
                    <h1 class="font-weight-bold">Ordina subito!</h1>
                    <p class="mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Sed imperdiet libero id nisi euismod, sed porta est
                        consectetur deserunt.
                    </p>
                    <p class="mb-4">
                        Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur.
                    </p>
                    <a class="btn gr-orange text-white w-50">Ordina</a>
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
