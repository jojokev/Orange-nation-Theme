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

            </fieldset>
            <fieldset v-bind:style="obtenerEstiloArea('demo2')">
                demo 3
            </fieldset>
        </div>
    </div>
</template>
  
  <script>
  export default {
    data() {
        return{
        progressBar: { 
            esVisible: !1, 
            indiceActivo: 0, 
            items: [] 
        },
        areaActual: 'demo1',
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

    },
    mounted() {
        this.inicializarProgressBar();
    }
  };
  </script>