<template>
  <q-page padding>
     <h3>Atualizar Pedido</h3>

    <q-input v-model="quantidade" type="number" label="Quantidade" />
    
    <q-input v-model="forma_pagamento" type="text" label="Forma de Pagamento" />

    <q-input v-model="fk_idCliente" type="number" label="Cliente" />

    <q-input v-model="fk_idProduto" type="number" label="Produto" />
    
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
      quantidade: '',
      forma_pagamento: '',
      fk_idCliente: '',
      fk_idProduto: ''
    }
  },

   mounted() {
    this.$axios.get('http://localhost:8080/Distribuidora/indexPedido.php?action=show&idPedido=' + this.$route.params.idPedido)
    .then((response) => {
      this.quantidade = response.data.quantidade;
      this.forma_pagamento = response.data.forma_pagamento;
      this.fk_idCliente = response.data.fk_idCliente;
      this.fk_idProduto = response.data.fk_idProduto;

      
    });
  },
  methods: {
    update() {
      let params = new URLSearchParams();
      params.append('action', 'atualizar');
      params.append('idPedido', this.$route.params.idPedido);
      params.append('quantidade', this.quantidade);
      params.append('forma_pagamento', this.forma_pagamento);
      params.append('fk_idCliente', this.fk_idCliente);
      params.append('fk_idProduto', this.fk_idProduto);
      

      this.$axios.post('http://localhost:8080/Distribuidora/indexPedido.php', params)
      .then((response) => {
        console.log(response);
        this.$q.dialog({
          title: 'Atenção',
          message: 'Atualizado com sucesso!'
      })
      this.$router.push('/pedidos');
      });
    },
    destroy() {
      this.$axios.get('http://localhost:8080/Distribuidora/indexPedido.php?action=deletar&idPedido=' + this.$route.params.idPedido)
      .then((response) => {
        this.$q.dialog({
          title: 'Atenção',
          message: 'Removido com sucesso'
        });
        this.$router.push('/pedidos');
      });
    }
  }




}
</script>

<style>
</style>
