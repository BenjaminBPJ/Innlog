<template>
    <div>
        <form action="post">
            <label for="pseudo">Pseudo : </label>
            <input type="text" name="pseudo" id="pseudo">
            <label for="password">password : </label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Se connecter" @click.prevent="onLogin()">
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'LoginPage',
  data(){
      return {
          Admin:{
              pseudo:null,
              password:null
          }
      }
  },
  methods: {
    onLogin(){
        const data = new FormData();
        data.append('pseudo', this.Admin.pseudo)
        data.append('password', this.Admin.password)
        axios.post('http://localhost/Innlog/Innlog/projet-innlog/src/backend/api.php?action=signup', data)
            .then((res)=>{
                console.log(res)
            })
            .catch((err)=>{
                console.log(err)
            })
    }
  }
}

</script>
