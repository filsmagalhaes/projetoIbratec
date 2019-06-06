<template>
  <q-page padding>
    <h3>Editar Vendedor</h3>

    <q-input v-model="cpf" type="text" label="cpf" />

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
      cpf: '',
      nome: '',
      telefone: '',
      email: ''
      
    }
  },
  mounted() {
    this.$axios.get('http://localhost:8080/Distribuidora/indexVendedor.php?action=show&idVendedor=' + this.$route.params.idVendedor)
    .then((response) => {
      this.cpf = response.data.cpf;
      this.nome = response.data.nome;
      this.telefone = response.data.telefone;
      this.email = response.data.email;
      
    });
  },
  methods: {
    update() {
      let params = new URLSearchParams();
      params.append('action', 'atualizar');
      params.append('idVendedor', this.$route.params.idVendedor);
      params.append('cpf', this.cpf);
      params.append('nome', this.nome);
      params.append('telefone', this.telefone);
      params.append('email', this.email);
      

      this.$axios.post('http://localhost:8080/Distribuidora/indexVendedor.php', params)
      .then((response) => {
        console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Atualizado com sucesso!'
      })
      this.$router.push('/vendedor');
      });
    },
    destroy() {
      this.$axios.get('http://localhost:8080/Distribuidora/indexVendedor.php?action=deletar&idVendedor=' + this.$route.params.idVendedor)
      .then((response) => {
        this.$q.dialog({
          title: 'Atenção',
          message: 'Removido com sucesso'
        });
        this.$router.push('/Vendedor');
      });
    }
  }
}
</script>

<style>
</style>