<template>
  <div>
    <h1>List of Invoices</h1>
    <table>
      <thead>
        <tr>
          <th>Invoice Number</th>
          <th>Date</th>
          <th> Name</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="invoice in invoices" :key="invoice.id">
          <td>{{ invoice.number }}</td>
          <td>{{ invoice.date }}</td>
          <td>{{ invoice.name }}</td>
          <td>{{ invoice.amount }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      invoices: [],
    };
  },
  created() {
    this.getInvoices();
  },
  methods: {
    async getInvoices() {
      const response = await axios.get('/api/invoices');
      this.invoices = response.data;
    },
  },
};
</script>
