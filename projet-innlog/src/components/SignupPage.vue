<template>
    <div class="signup-container">
        <h1 v-if="mode == 'signup'">Inscription</h1>
        <h1 v-else>Connexion</h1>
        <p v-if="mode == 'signup'">Vous avez déjà de compte ? <span class="go-for-log" @click="switchToLogin();">Se connecter</span></p>
        <p v-else>Vous n'avez pas encore de compte ? <span class="go-for-log" @click="switchToSignup();">Créer un compte</span></p>
        <form action="#">
            <label v-if="mode == 'signup'" for="pseudo">Pseudo : </label>
            <input v-if="mode == 'signup'" type="text" name="pseudo" id="pseudo" v-model="user.pseudo">
            <label for="email">Email : </label>
            <input type="mail" name="email" id="email" v-model="user.email">
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" v-model="user.password"><br>
            <small id="message-error"></small>
            <input v-if="mode == 'signup'" class="signup-button" type="submit" value="S'inscrire" @click.prevent="createAccount();">
            <input v-else class="signup-button" type="submit" value="Se connecter" @click.prevent="login();">
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
            // Génération des messages d'erreur
            let errorMessage = document.getElementById("message-error");
            errorMessage.innerHTML = res.data;
            if(res.data.error === false){
            this.$router.push('/home');
            }
      })
    },
    login(){
      let userData = this.getUser();
      // requête post avec axios pour modifier une sortie
      axios.post("http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=login", userData)
        .then((res)=> {
            // Génération des messages d'erreur
            let errorMessage = document.getElementById("message-error");
            errorMessage.innerHTML = res.data;
            if(res.data.error === false){
            this.$router.push('/home');
            }
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
.signup-container{
  display: flex;
  flex-direction: column;
}
form{
  display: flex;
  flex-direction: column;
  width: 40%;
  margin: auto;
}
input{
  width: 40%;
  margin: auto;
}
.go-for-log{
    cursor: pointer;
    text-decoration: underline;
    color: rgb(30, 129, 79);
}
.signup-button{
  cursor: pointer;
  border: none;
  border-radius: 3px;
  background-color:rgb(30, 129, 79);
  color: white;
  font-size: 1em; 
}
#message-error{
  font-size: 0.9em;
  color: red;
}
</style>
