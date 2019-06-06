    
<template>
  <q-page padding>
    <h3>Adicionar Pedido</h3>

    <q-input v-model="quantidade" type="number" label="Quantidade" />
    
    <q-input v-model="forma_pagamento" type="text" label="Forma de Pagamento" />

    <q-input v-model="fk_idCliente" type="number" label="Cliente" />

    <q-input v-model="fk_idProduto" type="number" label="Produto" />

    <q-btn @click="inserir()"  color="primary" label="Salvar" />
  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
  data() {
    return {
      quantidade: '',
      forma_pagamento: '',
      fk_idCliente: '',
      fk_idProduto: ''
    }
  },
  methods: {
    inserir() {
      
      let params = new URLSearchParams();
      params.append('action', 'inserir');
      params.append('quantidade', this.quantidade);
      params.append('forma_pagamento', this.forma_pagamento);
      params.append('fk_idCliente', this.fk_idCliente);
      params.append('fk_idProduto', this.fk_idProduto);      
      this.$axios.post('http://localhost:8080/Distribuidora/indexPedido.php', params)
      .then((response) => {
        console.log(response);
      });
    }
  }
}
</script>

<style>
</style>
