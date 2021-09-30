<template>
    <div>
        <h1 v-if="mode == 'signup'">Inscription</h1>
        <h1 v-else>Connexion</h1>
        <p v-if="mode == 'signup'">Vous avez déjà de compte ? <span class="go-for-log" @click="switchToLogin();">Se connecter</span></p>
        <p v-else>Vous n'avez pas encore de compte ? <span class="go-for-log" @click="switchToSignup();">Créer un compte</span></p>
        <form action="#">
            <label for="pseudo">Pseudo : </label>
            <input type="text" name="pseudo" id="pseudo" v-model="user.pseudo">
            <label v-if="mode == 'signup'" for="email">Email : </label>
            <input v-if="mode == 'signup'" type="text" name="email" id="email" v-model="user.email">
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" v-model="user.password">
            <input v-if="mode == 'signup'" type="submit" value="S'inscrire" @click.prevent="createAccount();">
            <input v-else type="submit" value="Se connecter" @click.prevent="">
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'SignupPage',
  data(){
      return {
          mode : 'signup',
          user : {
              pseudo : "",
              email : "",
              password : ""
          }
      }
  },
  methods: {
    switchToSignup(){
        this.mode = "signup"
      },
    switchToLogin(){
        this.mode = "login"
      },
    createAccount(){
      let userData = this.getUser();
      // requête post avec axios pour modifier une sortie
      axios.post("http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=signup", userData)
        .then((res)=> {
            console.log(res)
      })
    },
    getUser(){
        // récupération des données
      let pseudo = this.user.pseudo;
      let email = this.user.email;
      let password = this.user.password; 

       //création de données pour les envoyer au back
      let user = new FormData();
      user.append('pseudo', pseudo);
      user.append('email', email);
      user.append('password', password);

      return user
    }
 }
}
</script>

<style scoped>
.go-for-log{
    cursor: pointer;
    text-decoration: underline;
    color: royalblue;
}
</style>
