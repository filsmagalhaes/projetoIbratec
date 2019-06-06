<template>
  <q-page padding>
    <h3>Cadastrar Produto</h3>

    <q-input v-model="nome" type="text" label="nome" />

    <q-input v-model="valor" type="number" label="valor" />
    
    <q-input v-model="descricao" type="text" label="descricao" />

    
    <q-btn @click="inserir()" label="Salvar" />
  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
  data() {
    return {
      nome: '',
      valor: '',
      descricao: '',
      
    }
  },
  methods: {
    inserir() {
      
      let params = new URLSearchParams();
      params.append('action', 'inserir');
      params.append('nome', this.nome);
      params.append('valor', this.valor);
      params.append('descricao', this.descricao);
         
      this.$axios.post('http://localhost:8080/Distribuidora/indexProduto.php', params)
      .then((response) => {
        console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Cadastrado com sucesso!'
        })
        this.$router.push('/produtos');
        });
    }
  }
}
</script>

<style>
</style>


