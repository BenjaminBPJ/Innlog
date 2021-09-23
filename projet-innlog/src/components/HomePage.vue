<template>
<div>
  <div>
    <h1>Bienvenu sur l'application qui répertorie les meilleures balades de la région</h1>
    <div>
      <h3>Nom de la sortie</h3>
      <h2>"type de sortie"</h2>
      <p>allure moyenne</p>
      <p>durée</p>
      <p>commentaire</p>
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
export default {
  name: 'HomePage',
  data () {
    return {
      showAddModal : false,
      showEditModal : false
    }
  }
}
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
