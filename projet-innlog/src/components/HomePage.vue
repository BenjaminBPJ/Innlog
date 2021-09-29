<template>
<div>
  <div>
    <h1>Bienvenu sur l'application qui répertorie les meilleures balades de la région</h1>

    <!-- Carte pour une sortie -->
    <div v-for="outing in outings" :key="outing">
      <h3>Nom de la sortie : {{ outing.title }}</h3>
      <h2>Type de sortie : {{ outing.type }}</h2>
      <p>Vitesse moyenne : {{ outing.speedAverage }} km/h</p>
      <p>Distance : {{ outing.distance }} km</p>
      <p>durée</p>
      <p>Commentaire : {{ outing.comment }}</p>
      <button @click="showEditModal=true; selectOuting(outing);">Modifier la sortie</button>
      <button @click="selectOuting(outing);">Supprimer la sortie</button>
    </div>
    <button @click="showAddModal=true">Ajouter une nouvelle sortie</button>
  </div>

  <!-- modale création sortie -->
  <div id="overlay" v-if="showAddModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Ajout d'une sortie</h5>
          <button @click="showAddModal=false">X</button>
        </div>
        <div class="modal-body">
          <form action="#" method="post">
            <label for="outing-name">Nom de la sortie</label>
            <input type="text" name="outing-name" v-model="newOuting.title">
            <label for="outing-type">Type de la sortie</label>
            <input type="text" name="outing-type" v-model="newOuting.type">
            <label for="outing-speed">Vitesse moyenne</label>
            <input type="number" name="outing-speed" v-model="newOuting.speedAverage">
            <label for="outing-distance">Distance</label>
            <input type="number" name="outing-distance" v-model="newOuting.distance">
            <label for="outing-comment">Commentaire</label>
            <input type="text" name="outing-comment" v-model="newOuting.comment">
            <button type="" @click.prevent="showAddModal=false; createOuting();">Ajouter</button>
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
          <h5>Modification d'une sortie</h5>
          <button @click="showEditModal=false">X</button>
        </div>
        <div class="modal-body">
          <form action="#" method="post">
            <label for="outing-name">Nom de la sortie</label>
            <input type="text" name="outing-name" v-model="currentOuting.title">
            <label for="outing-type">Type de la sortie</label>
            <input type="text" name="outing-type" v-model="currentOuting.type">
            <label for="outing-speed">Vitesse moyenne</label>
            <input type="number" name="outing-speed" v-model="currentOuting.speedAverage">
            <label for="outing-distance">Distance</label>
            <input type="number" name="outing-distance" v-model="currentOuting.distance">
            <label for="outing-comment">Commentaire</label>
            <input type="text" name="outing-comment" v-model="currentOuting.comment">
            <button type="" @click="showEditModal=false; updateOuting();">Modifier</button>
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
      outings : [], 
      newOuting: { 
        title:"", 
        type:"", 
        speedAverage:"", 
        distance:"", 
        comment:""
        },
      currentOuting : {},
    }
  },
  mounted() {
    this.getAllOutings();
  },
  methods: {
    getAllOutings() {
      axios.get("http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=read")
        .then((response) => { 
          // récupération des données(sorties/outings) pour les insérer dans le tableau outings afin de les afficher
          this.outings = response.data.outings[0];
        })
    },
    createOuting() {
      let data = this.newOuting;
      let outingData = this.getData(data);
      // requête post avec axios pour créer une sortie
      axios.post("http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=create", outingData)
        .then(()=> {
          this.getAllOutings();
        })
    },
      updateOuting() {
        let data = this.currentOuting;
        let outingData = this.getData(data);
        // requête post avec axios pour modifier une sortie
        axios.post("http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=update", outingData)
          .then(()=> {
            this.getAllOutings();
        })
    },
    getData(data) {
      // récupération des données
      let id = data.id
      let title = data.title;
      let type = data.type; 
      let speedAverage = data.speedAverage; 
      let distance = data.distance;
      let comment = data.comment;

      //création de données pour les envoyer au back
      let outingData = new FormData();
      outingData.append('id', id);
      outingData.append('title', title);
      outingData.append('type', type);
      outingData.append('speedAverage', speedAverage);
      outingData.append('distance', distance);
      outingData.append('comment', comment);

      return outingData
    },
    selectOuting(outing) {
      this.currentOuting = outing;
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
