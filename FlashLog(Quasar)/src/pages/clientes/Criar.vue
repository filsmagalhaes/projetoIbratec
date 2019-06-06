<template>
  <q-page padding>
    <h3>Cadastrar Cliente</h3>

    
    <q-input v-model="cnpj" type="text" label="CNPJ" />

    <q-input v-model="nome" type="text" label="Nome" />
    
    <q-input v-model="telefone" type="text" label="Telefone" />

    <q-input v-model="email" type="text" label="Email" />

    <q-select v-model="email" type="text" label="Escolha o cliente" />
    

    

    <q-btn @click="inserir()"  color="primary" label="Salvar" />
    
    
    <q-btn  color="primary" label="Voltar" to="/"/>   

  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
  data() {
    return {
      cnpj: '',
      nome: '',
      telefone: '',
      email: ''
    }
  },
  methods: {
    inserir() {      
      let params = new URLSearchParams();
      params.append('action', 'inserir');
      params.append('cnpj', this.cnpj);
      params.append('nome', this.nome);
      params.append('telefone', this.telefone);
      params.append('email', this.email);  

      this.$axios.post('http://localhost:8080/Distribuidora/indexCliente.php', params)
      .then((response) => {
        console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Cadastrado com sucesso!'
        })
        this.$router.push('/clientes');
      });
    }
  }
}
</script>

<style>
</style>

