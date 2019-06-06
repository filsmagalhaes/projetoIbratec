<template>
  <q-page padding>
   <h3>
      produtos
      <q-btn to="/produtos/Criar" label="Novo" />
    </h3>
    <q-table 
      :columns="columns"
      :data="produtos">
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
          name: 'idProduto',
          field: 'idProduto',
          align: 'left',
          label: 'COD'
        },
        {
          name: 'nome',
          field: 'nome',
          align: 'left',
          label: 'nome'
        },
        {
          name: 'valor',
          field: 'valor',
          align: 'left',
          label: 'valor'
        },
        {
          name: 'descricao',
          field: 'descricao',
          align: 'left',
          label: 'descricao'
        }
        
      ],
      produtos: []
    }
  },
  mounted() {
   
      this.$axios.get('http://localhost:8080/Distribuidora/indexProduto.php')
      .then((response) => {
        for(var i = 0; i < response.data.length; i++) {
          this.produtos.push({
            nome: response.data[i].nome,
            valor: response.data[i].valor,
            descricao: response.data[i].descricao,
            idProduto: response.data[i].idProduto
          });
        }
     
      });
    
  },
  methods: {
    edit(produtos) {
      this.$router.push('/produtos/' + produtos.idProduto);
    }
  }
}
</script>

<style>
</style>