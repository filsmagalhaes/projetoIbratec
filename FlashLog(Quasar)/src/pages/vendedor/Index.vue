<template>
  <q-page padding>
   <h3>
      Vendedor
      <q-btn to="/vendedor/criar" label="Novo" />
    </h3>
    <q-table 
      :columns="columns"
      :data="vendedor">
      <q-tr  slot="body" slot-scope="props" :props="props" @click.native="edit(props.row)">
        <q-td v-for="col in props.cols" :key="col.name" :props="props">
          {{ col.value }}
        </q-td>
      </q-tr>
    </q-table><br/>
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
          name: 'idVendedor',
          field: 'idVendedor',
          align: 'left',
          label: 'idVendedor'
        },
         {
          name: 'nome',
          field: 'nome',
          align: 'left',
          label: 'Nome'
        },
       
        {
          name: 'cpf',
          field: 'cpf',
          align: 'left',
          label: 'CPF'
        },
       
         {
          name: 'email',
          field: 'email',
          align: 'left',
          label: 'email'
        },
      ],
      vendedor: []
    }
  },
  mounted() {
   
      this.$axios.get('http://localhost:8080/Distribuidora/indexVendedor.php')
      .then((response) => {
        for(var i = 0; i < response.data.length; i++) {
          this.vendedor.push({
            idVendedor: response.data[i].idVendedor,
            email: response.data[i].email,
            cpf: response.data[i].cpf,
            nome: response.data[i].nome
          });
        }
     
      });
    
  },
  methods: {
    edit(vendedor) {
      this.$router.push('/vendedor/' + vendedor.idVendedor);
    }
  }
}
</script>

<style>
</style>