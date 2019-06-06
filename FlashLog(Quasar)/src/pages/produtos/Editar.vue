<template>
  <q-page padding>
    <h3>Editar Produtos</h3>

    
    <q-input v-model="nome" type="text" label="nome" />
    
    <q-input v-model="valor" type="number" label="valor" />

    <q-input v-model="descricao" type="text" label="descricao" />

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
      nome: '',
      valor: '',
      descricao: ''
      
    }
  },
  mounted() {
    this.$axios.get('http://localhost:8080/Distribuidora/indexProduto.php?action=show&idProduto=' + this.$route.params.idProduto)
    .then((response) => {
      this.nome = response.data.nome;
      this.valor = response.data.valor;
      this.descricao = response.data.descricao;
      
    });
  },
  methods: {
    update() {
      let params = new URLSearchParams();
      params.append('action', 'atualizar');
      params.append('idProduto', this.$route.params.idProduto);
      params.append('nome', this.nome);
      params.append('valor', this.valor);
      params.append('descricao', this.descricao);
      

      this.$axios.post('http://localhost:8080/Distribuidora/indexProduto.php', params)
      .then((response) => {
        console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Atualizado com sucesso!'
      })
      this.$router.push('/produtos');
      });
    },
    destroy() {
      this.$axios.get('http://localhost:8080/Distribuidora/indexProduto.php?action=deletar&idProduto=' + this.$route.params.idProduto)
      .then((response) => {
        this.$q.dialog({
          title: 'Atenção',
          message: 'Removido com sucesso'
        });
        this.$router.push('/Produtos');
      });
    }
  }
}
</script>

<style>
</style>