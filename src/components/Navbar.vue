<template>
    <div class="container ">
        <ul id="proegress" v-if="progressBar.esVisible" class="progress_bar">
            <li v-for="(item, i) in progressBar.items"
                v-bind:class="{activo: i == progressBar.indiceActivo , 'antes-activo': i < progressBar.indiceActivo}">
                {{ item }}
            </li>
        </ul>
    </div>
    <div class="app_style">
        <div class="item_app">
            <fieldset v-bind:style="obtenerEstiloArea('demo1')">
                <h3>Elija el tipo de excursion</h3>
                <div class="content_tour_tipo">
                    <div @click="cargarPublicaciones(10)" 
                        :class="{ 'cat_active': 10 === categoriaSeleccionada }" class="item_tipo_tour">
                        <img src="https://mksdmcdn-9b59.kxcdn.com/trawell/wp-content/uploads/2018/03/austin-neill-184257-unsplash-380x507.jpg" alt="">
                        <div class="texto_cat">
                            <h4>Aventura</h4>
                            <span>8 Tours</span>
                        </div>
                    </div>
                    <div @click="cargarPublicaciones(15)" 
                        :class="{ 'cat_active': 15 === categoriaSeleccionada }" class="item_tipo_tour">
                        <img src="https://mksdmcdn-9b59.kxcdn.com/trawell/wp-content/uploads/2018/03/austin-neill-184257-unsplash-380x507.jpg" alt="">
                        <div class="texto_cat">
                            <h4>Cultural</h4>
                            <span>8 Tours</span>
                        </div>
                    </div>
                    <div @click="cargarPublicaciones(17)" 
                        :class="{ 'cat_active': 17 === categoriaSeleccionada }" class="item_tipo_tour">
                        <img src="https://mksdmcdn-9b59.kxcdn.com/trawell/wp-content/uploads/2018/03/austin-neill-184257-unsplash-380x507.jpg" alt="">
                        <div class="texto_cat">
                            <h4>Alternativo</h4>
                            <span>8 Tours</span>
                        </div>
                    </div>
                </div>
                <h4 v-if="categoriaSeleccionada">Elija el tour de su preferencia</h4>
                <TransitionGroup name="fade" tag="ul" mode="out-in" class="content_tours">
                        <li  v-for="post in posts" :key="post.id" 
                        @click="agregarAlCarrito(post)" >
                            <img :src="post.feature_media_url" alt="" >
                            <h5 v-html="post.title.rendered"></h5>
                        </li>
                    </TransitionGroup>
            </fieldset>
            <fieldset v-bind:style="obtenerEstiloArea('demo2')">
                demo 3
            </fieldset>
            <transition name="fade">
                    <div v-if="mensajeValidation" class="content_modal">
                        <div class="modal_animado">
                            <div class="titulo_modal">
                                <h5>{{ tituloNotificacion }} </h5>
                                <i class="bi bi-x" @click="cerrarModalNotificacion()"></i>
                            </div>
                            <div class="modal_text">
                                <div v-html="textoNotificacion"></div>
                                <div>
                                    <button v-if="btnAccion == 'notificacion'" type="button" @click="cerrarModalNotificacion()">
                                        Cerrar
                                    </button>
                                    <button v-if="btnAccion == 'eliminar'" class="btn_cancelar" type="button" @click="cerrarModalNotificacion()">
                                        Cancelar
                                    </button>
                                    <button v-if="btnAccion == 'eliminar'" type="button" @click="eliminarDelCarrito()">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition> 
        </div>
        <div class="item_app">
                <h3>Tours Seleccionados</h3>
                <div class="content_tour_seleccionado"> 
                    <div v-for="item in carrito" class="tour_seleccionado">
                        <img :src="item.producto.feature_media_url" alt="" >
                        <div>
                            <h4>{{ item.producto.title.rendered }} {{ item.producto.id}}</h4>
                            <div v-html="item.producto.excerpt.rendered"></div>
                            <span @click="modalInfoPost(item)">See more</span>
                            <button @click="abrirModalElimarTour(item)"><i class="bi bi-x"></i></button>
                            <!--<button @click="notificacionEliminar(item.producto)"><i class="bi bi-x"></i></button> -->
                        </div>
                    </div>
                </div>
                <transition name="fade">
                    <div v-if="selectpost" class="content_modal">
                        <span class="close_modal" @click="cerrarModalPost()">X</span>
                        <div class="modal_info_post">
                            <img :src="selectpost.producto.feature_media_url" alt="">
                            <div v-html="selectpost.producto.content.rendered"></div>
                        </div>
                    </div>
                </transition> 
                <div v-if="modal">
                    estas seguro de elimianr {{tituloTour}} 
                    <button @click="eliminarDelCarrito()">Eliminar del carrito</button>
                </div>
            </div>
    </div>
</template>
  
  <script>
  import { ref } from 'vue';
  export default {
    data() {
        return{
        categories: [],
        posts: [],
        categoriaSeleccionada: null,
        carrito: [],
        modal: false,
        progressBar: { 
            esVisible: !1, 
            indiceActivo: 0, 
            items: [] 
        },
        areaActual: 'demo1',
        mostrarObligatorios:false,
        selectpost: null,
        mensajeValidation: false,
        tituloNotificacion: '',
        textoNotificacion: '',
        btnAccion: 'notificacion',
        tourId: 0,
        contacto: {
            id: 0,
            nombre: '',
            email: '',
            telefono: {
                codigo: '',
                numero: ''
            },
            pais: '',
            fechaviaje: '',
            fechaviaje2: null,
            viajeros: '',
            hotel: {
                tipo_hotel: '',
                tipo_habitacion: '',
                tipo_cama: ''
            }
        },
        datePickerFechaPrincipal:null,
        datePickerFechaOpcional: null,
        validacion: {
            email:false,
            fecha:false
        },
        }
    },
    methods: {
        /* ------------------------------- Inicializar progress bar --------------------------- */
        inicializarProgressBar: function () {
            this.progressBar.items = ["Revisa tu pedido", "Datos personales", "Método de pago"],
            this.progressBar.indiceActivo = 0;
            this.progressBar.esVisible = true;
        }, 
        /* ------------------------------- Obtener area actual del fieldset --------------------------- */
        obtenerEstiloArea:function (area) {
            if(area == this.areaActual){
                return {display: 'block'};
            }else{
                return {display: 'none'};
            }
        },
        cargarPublicaciones(categoryId) {
            fetch(`http://localhost/amak/wp-json/wp/v2/posts?categories=${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    this.posts = data;
                    this.categoriaSeleccionada = categoryId;
                    this.demo();
                })
                .catch(error => console.error('Post no encontrados', error));
        },
        demo(){
            this.posts.forEach((post, index) => {
                (this.posts, index, { ...post, isVisible: true });
            });
        },
        agregarAlCarrito(producto) {
            const itemEnCarrito = this.carrito.find(item => item.producto.id === producto.id);

            if (itemEnCarrito) {
                    this.mensajeValidation = true;
                    this.tituloNotificacion = 'Ya existe!';
                    this.textoNotificacion = '<p>' + '<strong>' + itemEnCarrito.producto.title.rendered + '</strong>' + ' ya se encuentra agregado en su lista de viajes</p>';
                    this.btnAccion = 'notificacion';
            } else {
                this.carrito.push({ producto});   
            }
        },
        eliminarDelCarrito() {      
            this.carrito = this.carrito.filter(item => item.producto.id !== this.tourId);
            this.mensajeValidation = false;
            this.btnAccion = 'notificacion';
        },
        cerrarModalNotificacion(){
            this.mensajeValidation = false
        },
        cerrarModalPost()
        {
            this.selectpost = false
        },
        abrirModalElimarTour(tour){
            this.mensajeValidation = true;
            this.tituloNotificacion = 'Estas seguro ?';
            this.textoNotificacion = 'Estas seguro de eliminar ' + tour.producto.title.rendered;
            this.btnAccion = 'eliminar';
            this.tourId = tour.producto.id;
        },

    },
    mounted() {
        this.inicializarProgressBar();
    }
  };
  </script>
  <style>
    .list-enter-active,
    .list-leave-active {
        transition: opacity 0.5s;
    }
    .list-enter-from,
    .list-leave-to {
        opacity: 0;
    }
    .fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>