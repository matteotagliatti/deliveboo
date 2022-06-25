<template>
    <div v-if="restaurant">
        <div id="hero" class="position-relative bg-dark">
            <img class="position-absolute" :src="restaurant.immagine" alt="" />
            <div
                id="text-hero"
                class="text-center my-py-13 text-white position-absolute"
            >
                <h1>{{ restaurant.nome }}</h1>
                <p>{{ restaurant.indirizzo }}</p>
            </div>
        </div>

        <div class="container py-5" id="menu">
            <div class="row">
                <!-- Menu -->
                <div class="col-12 col-md-8 mb-5">
                    <h2>Menu</h2>
                    <p class="mb-4">
                        Clicca sui singoli piatti per aggiungerli al carrello.
                    </p>
                    <div class="items">
                        <div
                            class="item p-4"
                            v-for="(dish, index) in restaurant.dishes"
                            :key="index"
                            :class="
                                dish.visibilita == 0 ? 'my-not-visible' : ''
                            "
                            @click="dish.visibilita == 1 ? addToCart(dish) : ''"
                        >
                            <h3>{{ dish.nome }}</h3>
                            <p>Descrizione: {{ dish.descrizione }}</p>
                            <p>Ingredienti: {{ dish.ingredienti }}</p>
                            <p>{{ dish.prezzo }} €</p>
                        </div>
                    </div>
                </div>
                <!-- Checkout -->
                <div class="col-12 col-md-4">
                    <div class="container">
                        <h2 class="mb-4">Carrello</h2>
                        <table class="table mb-4" v-if="cart.length > 0">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Rimuovi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(dish, index) in cart" :key="index">
                                    <td>{{ dish.nome }}</td>
                                    <td>{{ dish.prezzo }} €</td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-danger"
                                            @click="removeFromCart(dish)"
                                        >
                                            Rimuovi
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Totale</th>
                                    <td>{{ totalTwoDecimals }} €</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--  -->
                        <div v-if="cart.length > 0">
                            <h3>Checkout</h3>
                            <input
                                class="form-control"
                                type="text"
                                v-model="userName"
                                placeholder="Nome*"
                                required
                            />
                            <input
                                class="form-control"
                                type="text"
                                v-model="userSurname"
                                placeholder="Cognome*"
                                required
                            />
                            <input
                                class="form-control"
                                type="text"
                                v-model="userIndirizzo"
                                placeholder="Indirizzo*"
                                required
                            />
                            <input
                                class="form-control"
                                type="text"
                                v-model="userTelefono"
                                placeholder="Numero di telefono*"
                                @keyup="validatePhone(userTelefono)"
                                required
                            />
                            <small
                                class="text-danger"
                                v-if="
                                    validatePhoneMessage == 'Numero non valido'
                                "
                            >
                                {{ validatePhoneMessage }}
                            </small>
                            <input
                                class="form-control"
                                type="text"
                                v-model="userEmail"
                                placeholder="Email*"
                                required
                                @keyup="validateEmail(userEmail)"
                            />
                            <small
                                class="text-danger"
                                v-if="
                                    validateEmailMessage == 'Email non valida'
                                "
                            >
                                {{ validateEmailMessage }}
                            </small>
                            <v-braintree
                                authorization="sandbox_q745yw9z_7wbb5qxhqhm6qydj"
                                locale="it_IT"
                                btnText="Ordina"
                                @success="onSuccess"
                                @error="onError"
                            ></v-braintree>
                        </div>
                        <div v-if="responseMessage && cart.length == 0">
                            <p class="text-success font-weight-bold">
                                {{ responseMessage }}
                            </p>
                        </div>
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
            restaurant: null,
            cart: [],
            total: 0,
            id: null,
            userName: null,
            userSurname: null,
            userIndirizzo: null,
            userTelefono: null,
            validatePhoneMessage: null,
            userEmail: null,
            validateEmailMessage: null,
            responseMessage: null,
        };
    },
    methods: {
        addToCart(dish) {
            this.cart.push(dish);
            this.total += parseFloat(dish.prezzo);
            this.save();
        },
        removeFromCart(dish) {
            this.cart.splice(this.cart.indexOf(dish), 1);
            this.total -= parseFloat(dish.prezzo);
            this.save();
        },
        save() {
            localStorage.setItem("cart", JSON.stringify(this.cart));
            localStorage.setItem("total", this.total);
        },
        onSuccess(payload) {
            console.log("Success!", payload);
            axios
                .post("/checkout", {
                    nonce: payload.nonce,
                    total: this.total.toFixed(2),
                    restaurantId: this.id,
                    userName: this.userName,
                    userSurname: this.userSurname,
                    userIndirizzo: this.userIndirizzo,
                    userTelefono: this.userTelefono,
                    userEmail: this.userEmail,
                    userDatetime: this.userDatetime,
                })
                .then((response) => {
                    this.cart = [];
                    this.total = 0;
                    this.save();
                    this.responseMessage = response.data.message;
                });
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },
        validateEmail(value) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
                this.validateEmailMessage = "Email valida";
            } else {
                this.validateEmailMessage = "Email non valida";
            }
        },
        validatePhone(value) {
            if (/^\d+$/.test(value)) {
                this.validatePhoneMessage = "Numero valido";
            } else {
                this.validatePhoneMessage = "Numero non valido";
            }
        },
    },
    mounted() {
        const url = window.location.href;
        const id = url.substring(url.lastIndexOf("/") + 1);
        this.id = id;

        axios
            .get(`/api/users/${id}`)
            .then((response) => {
                this.restaurant = response.data;
            })
            .catch((error) => {
                console.log(error);
            });

        if (localStorage.getItem("cart")) {
            try {
                this.cart = JSON.parse(localStorage.getItem("cart"));
                this.total = parseFloat(localStorage.getItem("total"));
            } catch (e) {
                localStorage.removeItem("cart");
                localStorage.removeItem("total");
            }
        }
    },
    computed: {
        // this.total with only two numbers after the decimal point
        totalTwoDecimals() {
            return this.total.toFixed(2);
        },
    },
};
</script>

<style scoped></style>
