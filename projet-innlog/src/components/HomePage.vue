<template>
<div>
  <div>
    <h1>Bienvenu sur l'application qui répertorie les meilleures balades de la région</h1>
    <div v-for="outing in outings" :key="outing">
      <h3>{{ outing.title }}</h3>
      <h2>{{ outing.type }}</h2>
      <p>{{ outing.speedAverage }}</p>
      <p>durée</p>
      <p>{{ outing.comment }}</p>
      <button @click="showEditModal=true">Modifier la sortie</button>
    </div>
    <button @click="showAddModal=true">Ajouter une nouvelle sortie</button>
  </div>

  <!-- modale création sortie -->
  <div id="overlay" v-if="showAddModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>sortie</h5>
          <button @click="showAddModal=false">X</button>
        </div>
        <div class="modal-body">
          <form action="#" method="post">
            <label for="outing-name">Nom de la sortie</label>
            <input type="text" name="outing-name">
            <label for="outing-type">Type de la sortie</label>
            <input type="text" name="outing-type">
            <label for="outing-speed">Vitesse moyenne</label>
            <input type="text" name="outing-speed">
            <label for="outing-time">Durée</label>
            <input type="text" name="outing-time">
            <label for="outing-comment">Commentaire</label>
            <input type="text" name="outing-comment">
            <button type="" @click="showAddModal=false">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </div>

      <!-- modale modification sortie -->
  <div id="overlay" v-if="showEditModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>sortie</h5>
          <button @click="showEditModal=false">X</button>
        </div>
        <div class="modal-body">
          <form action="#" method="post">
            <label for="outing-name">Nom de la sortie</label>
            <input type="text" name="outing-name">
            <label for="outing-type">Type de la sortie</label>
            <input type="text" name="outing-type">
            <label for="outing-speed">Vitesse moyenne</label>
            <input type="text" name="outing-speed">
            <label for="outing-time">Durée</label>
            <input type="text" name="outing-time">
            <label for="outing-comment">Commentaire</label>
            <input type="text" name="outing-comment">
            <button type="" @click="showEditModal=false">Modifier</button>
          </form>
        </div>
      </div>
    </div>
  </div> 
</div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'HomePage',
  data () {
    return {
      showAddModal : false,
      showEditModal : false,
      outings : []
    }
  },
  mounted() {
    this.getAllOutings();
  },
  methods: {
    getAllOutings() {
      axios.get("http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=read")
        //.then((response) => { console.log(response.data.outings[0],)})
        .then((response) => { 
          this.outings = response.data.outings[0];
          console.log(this.outings);
          })
    },
    createOuting() {
      axios.post("http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=create")
        .then(()=>{

        })
    }
  }
};
</script>


<style scoped>
#overlay{
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.6);
}
</style>
