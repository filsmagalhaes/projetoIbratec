<template>
  <q-page padding>
   <h3>
      Clientes
      <q-btn to="/clientes/criar" label="Novo" />
    </h3>
    <q-table 
      :columns="columns"
      :data="clientes">
      <q-tr  slot="body" slot-scope="props" :props="props" @click.native="edit(props.row)">
        <q-td v-for="col in props.cols" :key="col.name" :props="props">
          {{ col.value }}
        </q-td>
          <q-icon name="delete"/>
          <q-icon name="edit" />
          
      </q-tr>
    </q-table>
    <q-btn to="/" label="Voltar" />
  </q-page>
  
</template>

<script>
export default {
  // name: 'PageName',
  data() {
    return {
      columns: [
        {
          name: 'idCliente',
          field: 'idCliente',
          align: 'left',
          label: 'Cod'
        },
        {
          name: 'nome',
          field: 'nome',
          align: 'left',
          label: 'Nome'
        }
      ],
      clientes:[]
    }
  },
  mounted() {
   
      this.$axios.get('http://localhost:8080/Distribuidora/indexCliente.php')
      .then((response) => {
        for(var i = 0; i < response.data.length; i++) {
          this.clientes.push({
            idCliente: response.data[i].idCliente,
            nome: response.data[i].nome,
           

          });
        }
     
      });
    
  },
  methods: {
    edit(clientes) {
      this.$router.push('/clientes/' + clientes.idCliente);
    }
  }
}
</script>

<style>
</style>