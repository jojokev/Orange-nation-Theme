<template>
    <div class="form_content">
        <h4>Booking Information</h4>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="input" >
                    <label>Which Tour/Trek are you booking?</label><br>
                    <input v-if="nombreTour" v-model="formulario.tour" type="text" :placeholder="nombreTour" :disabled="nombreTour !== ''" />
                    <select v-if="!nombreTour" v-model="selectedTour">
                        <optgroup v-for="(tours, categoria) in toursAgrupados" :label="categoria" :key="categoria">
                            <option v-for="tour in tours" :key="tour.id" :value="tour.title.rendered">
                                <span v-html="tour.title.rendered"></span>
                            </option>
                        </optgroup>
                    </select>
                    <div v-if="!nombreTour ">
                        <div v-if="loading" style="left: 0;transform: translate(-19%, -18%);top: 50%;background-color: #fff;z-index: 9;width: 100%;padding: 9px;border-radius: 5px;">
                            <p style="font-size: 13px;">Loading tours, please wait...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="input" v-bind:class="generarClasesCss('servicio')">
                    <label>Booking a group or private service?</label><br>
                    <div class="label_content">
                        <div class="form-check form-check-inline ps-0">
                            <label>
                                <input type="radio" v-model="formulario.servicio" value="group" />
                                <span class="checkmark"></span>
                                Group Service
                                <i type="button" class="bi bi-info-circle ms-1"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-html="true" 
                                    data-bs-title="<h4>Group tour</h4>
                                        <p>
                                            A group tour means that there will be other travelers making up our travel team.
                                        </p>">
                                </i>
                            </label>
                        </div><br>
                        <div class="form-check form-check-inline ps-1" v-bind:class="generarClasesCss('servicio')">
                            <label>
                                <input type="radio" v-model="formulario.servicio" value="private" />
                                <span class="checkmark"></span>
                                Private Service
                                <i type="button" class="bi bi-info-circle ms-1"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-html="true" 
                                    data-bs-title="<h4>Private tour</h4>
                                        <p>
                                            A private tour means that there will be no other travelers, only you and your companion, as well as our guide and the porters.
                                        </p>">
                                </i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input" v-bind:class="generarClasesCss('fechaincio')">
                    <label>Departure date</label>
                    <input id="dateBook1" v-model="formulario.fecha_incio" >
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input">
                    <label>Optional Tour/Trek Date</label>
                    <input id="dateBook2" v-model="formulario.fecha_opcional">
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input">
                    <label>Number of travelers</label>
                    <div class="btn_travel">
                        <button @click="disminuirTravel();" type="button">-</button>
                        <input type="text" :value="formulario.viajeros">
                        <button @click="aumentarTravel();" type="button">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form_content" v-for="(viajero, index) in formulario.viajeros" :key="index">
        <div class="title_form">
            <h4>Traveler {{ index + 1 }}</h4>
            <i class="bi bi-x" @click="eliminarViajero(index);"></i> 
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="input">
                    <label>Firts Name (must match name on passport) *</label>
                    <input type="text" v-model="formulario.travel[index].nombre" placeholder="Firts Name">
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input" >
                    <label>Last Name *</label>
                    <input type="text" v-model="formulario.travel[index].apellido" placeholder="Last Name">
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input">
                    <label>E-mail *</label>
                    <input type="text" v-model="formulario.travel[index].email" placeholder="E-mail">
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input">
                    <label>Doc. Type *</label>
                    <div class="btn_travel">
                        <select name="" style="text-align: left;cursor: pointer;" v-model="formulario.travel[index].tipo_documento">
                            <option value="passport">Passport</option>
                            <option value="dni">DNI</option>
                            <option value="driver_license">Driver License</option>
                        </select>
                        <input type="text" style="pointer-events: auto;outline: none;text-align: left;width: 100%;" v-model="formulario.travel[index].numero_documento">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="input">
                    <label>Birth Date *</label>
                    <input type="text" v-model="formulario.travel[index].fecha_documento" placeholder="Select date">
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="input">
                    <label>Country</label>
                    <input type="text" v-model="formulario.travel[index].pais" placeholder="Country">
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="input">
                    <label>Gender *</label>
                    <div class="label_content">
                        <div class="form-check form-check-inline ps-0">
                            <label>
                                <input type="radio" v-model="formulario.travel[index].genero" value="male" />
                                <span class="checkmark"></span>
                                Male
                            </label>
                        </div><br>
                        <div class="form-check form-check-inline ps-1">
                            <label>
                                <input type="radio" v-model="formulario.travel[index].genero" value="female" />
                                <span class="checkmark"></span>
                                Female
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="input">
                    <label>Are you a student? *</label>
                    <div class="label_content">
                        <div class="form-check form-check-inline ps-0">
                            <label>
                                <input type="radio" v-model="formulario.travel[index].estudiante" value="yes" />
                                <span class="checkmark"></span>
                                Yes
                            </label>
                        </div><br>
                        <div class="form-check form-check-inline ps-1">
                            <label>
                                <input type="radio" v-model="formulario.travel[index].estudiante" value="no" />
                                <span class="checkmark"></span>
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="input">
                    <label>Food Restrictions / Allergies?</label>
                <div class="label_content">
                    <div class="form-check form-check-inline ps-0">
                        <label>
                            <input type="radio" v-model="formulario.travel[index].restriccion" value="yes" />
                            <span class="checkmark"></span>
                            Yes
                        </label>
                    </div><br>
                    <div class="form-check form-check-inline ps-1">
                        <label>
                            <input type="radio" v-model="formulario.travel[index].restriccion" value="no" />
                            <span class="checkmark"></span>
                            No
                        </label>
                    </div>
                </div>
                <div v-if="formulario.travel[index].restriccion === 'yes'" style="position: relative;    
                            transform: none;
                            left: 0;
                            margin: 25px 0px 10px;
                            width: 100%;">
                    <textarea name=""  id=""  v-model="formulario.travel[index].datos_restriccion" rows="5" style="pointer-events: auto;"></textarea>
                </div>
                </div>
            </div>
        </div>
    </div>



    <div class="form_content">
        <h4>CONTACT INFORMATION</h4>
        <p>What is the email address of the person for the main Point Of Contact (POC) in your group?</p>
        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="input" v-bind:class="generarClasesCss('nombre')">
                    <label>Traveler</label>
                    <input v-model="formulario.nombre" type="text" value="" placeholder="">
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input" v-bind:class="generarClasesCss('email')">
                    <label>E-mail * </label>
                    <input type="text" v-model="formulario.email" >
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="input" v-bind:class="generarClasesCss('telefono')">
                    <label>Phone Number * </label>
                    <input type="number" v-model="formulario.telefono">
                </div>
            </div>
        </div>
    </div>
    <div class="form_content">
        <h4>Adicional Information</h4>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="input" >
                    <label>Additional information about hotel</label>
                    <textarea v-model="formulario.adicional.hotel" name="" rows="4"></textarea>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="input" >
                    <label>Please add any additional information you think SAM CORPORATIONS needs to know for your booking.</label>
                    <textarea v-model="formulario.adicional.datos" name="" rows="4"></textarea>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="input">
                    <label>How did you hear about Sam Corporations? </label>
                    <input v-model="formulario.adicional.web" >
                </div>
            </div>
        </div>
    </div>
    <button  class="btn_reserva" @click="validarDatosFormulario();">
        Submit booking
    </button>
    <div class="loader" v-if="loader">
        <img src="https://www.samcorporations.com/wp-content/uploads/2024/02/loader.gif" alt="">
        <span>
            Sending ...
        </span>
    </div>
    
</template>

<script>

  import Swal from 'sweetalert2';

  export default {
    data() {
        return{
            nombreTour: '',
            pageTitle: '',
            formulario: {
                travel: [
                    { 
                        nombre: '',
                        apellido: '',
                        email: '',
                        tipo_documento: 'passport',
                        numero_documento: '',
                        fecha_documento: '',
                        pais: '',
                        genero: '',
                        estudiante: 'no',
                        restriccion: 'no',
                        fecha_tavel: '',
                        datos_restriccion: ''
                    }
                ],
                nombre: '',
                apellidos: '',
                fecha_incio: '',
                fecha_opcional: '',
                servicio: '',
                viajeros: 1,
                email: '',
                telefono: '',
                adicional:{
                    hotel: '',
                    datos: '',
                    web: ''
                }
            },
            mostrarObligatorios: null,
            datePickerFechaPrincipal:null,
            datePickerFechaOpcional: null,
            datePickerFechaTravel: null,
            validacion: {
                email:false,
            },
            loader: false,
            tourFiltrado: [],
            selectedTour: null,
            loading: true,
            toursAgrupados: {}
        }
    },
    created() {
        this.nombreTour = localStorage.getItem("tour");
        this.listarTour();
    },
    methods: {
        aumentarTravel() {
            this.formulario.viajeros++;
            this.formulario.travel.push({ nombre: '',
                        apellido: '',
                        email: '',
                        tipo_documento: 'passport',
                        numero_documento: '',
                        fecha_documento: '',
                        pais: '',
                        genero: '',
                        estudiante: 'no',
                        restriccion: 'no',
                        datos_restriccion: '' });
            this.demoCalendar();
        },
        disminuirTravel() {
        if (this.formulario.viajeros >= 0) {
            this.formulario.viajeros--;
            this.formulario.travel.pop();
        }
        },
        eliminarViajero(index) {
            this.formulario.travel.splice(index, 1);
            this.formulario.viajeros--;
            //alert(this.formulario.travel[index].nombre);
        },
        handleImageUpload(event, index) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                // Directly assign the image to the object without $set
                this.formulario.travel[index].image = e.target.result;
                };
                reader.readAsDataURL(file); // Convert image to base64 string
            }
        },
        listarTour() {
        var url = 'https://www.orange-nation.com/wp-json/wp/v2/posts?per_page=100';
        var _this = this;

        _this.loading = true;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                const toursPorCategoria = {};

                data.forEach(tour => {
                    if (tour.categories_data && Array.isArray(tour.categories_data)) {
                        const hasBlogOrangeCategory = tour.categories_data.some(category => 
                            category.name === 'Blog Orange' || category.slug === 'blog-orange'
                        );

                        if (!hasBlogOrangeCategory) {
                            tour.categories_data.forEach(category => {
                                if (!toursPorCategoria[category.name]) {
                                    toursPorCategoria[category.name] = [];
                                }
                                toursPorCategoria[category.name].push(tour);
                            });
                        }
                    } else {
                        if (!toursPorCategoria['Sin categoría']) {
                            toursPorCategoria['Sin categoría'] = [];
                        }
                        toursPorCategoria['Sin categoría'].push(tour);
                    }
                });

                _this.toursAgrupados = toursPorCategoria;

                const firstCategory = Object.values(toursPorCategoria)[0]; 
                if (firstCategory && firstCategory.length > 0) {
                    _this.selectedTour = firstCategory[0].title.rendered; 
                }

                _this.loading = false;

                console.log(_this.toursAgrupados);
            })
            .catch(error => {
                console.error('Error al obtener los datos:', error);
                _this.loading = false; 
            });
    },
        generarClasesCss:function (nombreCampo){
            return{
                error : this.mostrarObligatorios && !this.esValido(nombreCampo) ,
                bvalido: this.mostrarObligatorios && this.esValido(nombreCampo)
            };
        },
        validarDatosFormulario() {
            let valido = true;

            // Validar campos obligatorios
            if (
                this.formulario.fecha_incio === '' ||
                this.formulario.servicio.trim() === '' ||
                this.formulario.nombre.trim() === '' ||
                this.formulario.email.trim() === '' ||
                this.formulario.telefono === ''
            ) {
                Swal.fire({
                    position: "top-center",
                    icon: "error",
                    title: "Oops...",
                    html: "<p>Please complete all required fields.</p>",
                    showConfirmButton: false,
                    timer: 2500
                });
                valido = false;
            } else {
                this.validacion.email = this.validarEmail();
                if (!this.validacion.email) {
                    Swal.fire({
                        position: "top-center",
                        icon: "error",
                        title: "Oops...",
                        html: "<p>Error: The email is misspelled.</p>",
                        showConfirmButton: false,
                        timer: 2500
                    });
                    valido = false;
                }
            }

            this.mostrarObligatorios = !valido;

            if (valido) {
                this.enviarReserva();
            }

            return valido;
        },

        validarEmail() {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(this.formulario.email);
        },
        generarClasesCss:function (nombreCampo){
            return{
                error : this.mostrarObligatorios && !this.esValido(nombreCampo) ,
                bvalido: this.mostrarObligatorios && this.esValido(nombreCampo)
            };
        },
        esValido:function (nombreCampo){
            let esValido = false;
            switch (nombreCampo){
                case 'nombre': esValido = this.formulario.nombre !=''; break;
                case 'apellidos': esValido = this.formulario.apellidos !=''; break;
                case 'servicio': esValido = this.formulario.servicio !=''; break;
                case 'fechaincio': esValido = this.formulario.fecha_incio !=''; break;
                case 'email': esValido = this.formulario.email !=''; break;
                case 'telefono': esValido = this.formulario.telefono !=''; break;
            }
            return esValido;
        },
        inicializarFecha(){
            this.datePickerFechaPrincipal = flatpickr ('#dateBook1', {
                enableTime: false,
                dateFormat: "d-M-Y",
                minDate: "today",
                showMonths: 2,
            });
            this.datePickerFechaOpcional = flatpickr ('#dateBook2', {
                enableTime: false,
                dateFormat: "d-M-Y",
                minDate: "today",
                showMonths: 2,
            });
            
        },
        demoCalendar(){
            this.datePickerFechaTravel = flatpickr ('.fechaTravel', {
                enableTime: false,
                dateFormat: "d-M-Y",
            });
        },
        enviarReserva(){
            // URL ruta de la hoja php donde enviaremos los datos para guardar en BD y enviar al correo
            var url = '../wp-content/themes/neworange/email/src/booking.php';

            var data = new FormData();

            if(this.nombreTour){
                data.append('tour', this.formulario.tour = this.nombreTour);
            }else{
                data.append('tour', this.selectedTour);
            }
            data.append('travels', JSON.stringify(this.formulario.travel));
            data.append('servicio', this.formulario.servicio);
            data.append('fechaincio', this.formulario.fecha_incio);
            data.append('fechaopcional', this.formulario.fecha_opcional);
            data.append('viajeros', this.formulario.viajeros);
            data.append('nombre', this.formulario.nombre);
            data.append('email', this.formulario.email);
            data.append('telefono', this.formulario.telefono);
            data.append('detalles', JSON.stringify(this.formulario.adicional));
            this.loader = true;

            fetch(url, { method: 'POST', body: data,})
              .then(response => response.json())
              .then(result => {
                if (result.reservado) {
                    this.loader = false;
                    Swal.fire({
                        position: "top-center",
                        icon: "success",
                        title: ":)",
                        html: "<p>Your reservation was successfully sent, we will contact you as soon as possible.</p>",
                        showConfirmButton: false,
                        timer: 2500
                    });
                    this.limpiarDatos();
                } else {
                    this.loader = false;
                    Swal.fire({
                        position: "top-center",
                        icon: "error",
                        title: "Oops...",
                        html: "<p>Your reservation could be sent to us, fill out all the required fields</p>",
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
              })
              .catch(error => {
                console.error('Error:', error);
              });
        },
        limpiarDatos(){
            this.formulario.tour = '';
            this.formulario.servicio = '';
            this.formulario.fecha_incio = '';
            this.formulario.fecha_opcional = '';
            this.formulario.viajeros = '';
            this.formulario.nombre = '';
            this.formulario.apellidos = '';
            this.formulario.email = '';
            this.formulario.telefono = '';
            this.formulario.adicional = '';
        }
    },
    mounted() {
        this.inicializarFecha();
        this.listarTour
        this.demoCalendar();
    }
  };
  </script>