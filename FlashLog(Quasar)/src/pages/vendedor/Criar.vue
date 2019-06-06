<template>
  <q-page padding>
    <h3>Cadastrar Vendedor</h3>

    
    <q-input v-model="cpf" type="number" label="CPF" />

    <q-input v-model="nome" type="text" label="Nome" />
    
    <q-input v-model="telefone" type="number" label="Telefone" />

    <q-input v-model="email" type="text" label="Email" />
    

    

    <q-btn @click="inserir()" label="Salvar" />
    <q-btn to="/vendedor" label="Voltar" /><br/>   
    <q-btn to="/vendedor" label="Editar" /><br/>

  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
  data() {
    return {
      cpf: '',
      nome: '',
      telefone: '',
      email: ''
    }
  },
  methods: {
    inserir() {      
      let params = new URLSearchParams();
      params.append('action', 'inserir');
      params.append('cpf', this.cpf);
      params.append('nome', this.nome);
      params.append('telefone', this.telefone);
      params.append('email', this.email);  

      this.$axios.post('http://localhost:8080/Distribuidora/indexVendedor.php', params)
      .then((response) => {
        console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Cadastrado com sucesso!'
        })
        this.$router.push('/vendedor');
      });
    }
  }
}
</script>

<style>
</style>

