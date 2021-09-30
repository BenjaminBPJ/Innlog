<template>
  <div id="app">
    <SignupPage />
    <HomePage/>
  </div>
</template>

<script>
import SignupPage from './components/SignupPage.vue'
import HomePage from './components/HomePage.vue'

export default {
  name: 'App',
  components: {
    SignupPage,
    HomePage
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
