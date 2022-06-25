<template>
    <div>
        <div id="hero" class="position-relative bg-dark">
            <img src='/img/restaurant-hero.jpg' alt="">
            <div id="text-hero" class="text-center my-py-13 text-white position-absolute">
                <h1>Tutti i ristoranti</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="container py-5">
                    <div class="my-grid">
                        <a
                            :href="restaurant.id"
                            class="my-grid-element d-flex"
                            v-for="(restaurant, index) in restaurants"
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
    </div>
</template>

<script>

export default {
    name: "App",
    components: {},
    data() {
        return {
            restaurants: []
        };
    },
    created() {
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
};
</script>

<style scoped></style>
