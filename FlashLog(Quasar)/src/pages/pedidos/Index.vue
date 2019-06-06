<template>
  <q-page padding>
    <h3>
      Pedidos
      <q-btn to="/pedidos/criar" label="Novo" />
    </h3>
    <q-table 
      :columns="columns"
      :data="pedidos">
      <q-tr slot="body" slot-scope="props" :props="props" @click.native="edit(props.row)">
        <q-td v-for="col in props.cols" :key="col.name" :props="props">
          {{ col.value }}
        </q-td>
      </q-tr>
    </q-table>
  </q-page>
</template>

<script>

export default {
  // name: 'PageName',
  data() {
    return {
      columns: [
        {
          name: 'idPedido',
          field: 'idPedido',
          align: 'left',
          label: 'ID'
        },
        {
          name: 'quantidade',
          field: 'quantidade',
          align: 'left',
          label: 'quantidade'
        },
         {
          name: 'forma_pagamento',
          field: 'forma_pagamento',
          align: 'left',
          label: 'forma_pagamento'
        }
      ],
      
      
      pedidos: []
    }
  },
  mounted() {

      this.$axios.get('http://localhost:8080/Distribuidora/indexPedido.php')
      .then((response) => {
        for(var i = 0; i < response.data.length; i++) {
          this.pedidos.push({
            idPedido: response.data[i].idPedido,
            quantidade: response.data[i].quantidade,
            forma_pagamento:response.data[i].forma_pagamento
          });
        }
     
      });
    
  },
  methods: {
    edit(pedidos) {
      this.$router.push('/pedidos/' + pedidos.idPedido);
    }
  }
}
</script>

<style>
</style>
