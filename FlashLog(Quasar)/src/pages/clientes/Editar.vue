<template>
  <q-page padding>
    <h3>Editar Cliente</h3>

    <q-input v-model="cnpj" type="text" label="cnpj" />

    <q-input v-model="nome" type="text" label="nome" />
    
    <q-input v-model="telefone" type="text" label="telefone" />

    <q-input v-model="email" type="text" label="email" />

    

        <q-btn-group>
      <q-btn @click="update()" label="Atualizar" />
     
      <q-btn @click="destroy()" color="red-5" label="Remover" />
     
    </q-btn-group>
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
  mounted() {
    this.$axios.get('http://localhost:8080/Distribuidora/indexCliente.php?action=show&idCliente=' + this.$route.params.idCliente)
    .then((response) => {
      this.cnpj = response.data.cnpj;
      this.nome = response.data.nome;
      this.telefone = response.data.telefone;
      this.email = response.data.email;
      
    });
  },
  methods: {
    update() {
      let params = new URLSearchParams();
      params.append('action', 'atualizar');
      params.append('idCliente', this.$route.params.idCliente);
      params.append('cnpj', this.cnpj);
      params.append('nome', this.nome);
      params.append('telefone', this.telefone);
      params.append('email', this.email);
      

      this.$axios.post('http://localhost:8080/Distribuidora/indexCliente.php', params)
      .then((response) => {
        console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Atualizado com sucesso!'
      })
      this.$router.push('/clientes');
      });
    },
    destroy() {
      this.$axios.get('http://localhost:8080/Distribuidora/indexCliente.php?action=deletar&idCliente=' + this.$route.params.idCliente)
      .then((response) => {
         console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Removido com sucesso'
        });
        this.$router.push('/clientes');
      });
    }
  }
}
</script>

<style>
</style>