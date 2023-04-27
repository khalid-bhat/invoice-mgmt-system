@include('components.header')
        <div class="main-panel">
<div class="col-sm-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Invoice form</h4>
        <form  method="post" action= "{{ url('/invoice-store') }}"  class="forms-sample" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="customer_name"> Number</label>
                <input class="form-control"  type="text" name="number" id="number" required>
            </div>
            <div  class="form-group">
                <label for="customer_email">Address</label>
                <input class="form-control" type="text" name="address" id="address" required>
            </div>
            <div  class="form-group">
                <label for="customer_email">Date</label>
                <input class="form-control" type="date" name="date" id="date"  format="yyyy-mm-dd" required>
            </div>

            <hr>
            <div id="invoice_items" class= "form-group row ">
                <div class="col">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" name="description[]" id="description" required>
                </div>
                <div class="col">
                    <label for="Amount">Amount</label>
                    <input  type="number" class="form-control"   name="amount[]" id="amount" required>
                </div>
            </div>
            <button type="button" onclick="addInvoiceItem()">Add Item</button>
            <hr>
            <button type="submit" >Submit</button>
        </form>

        <script>
            function addInvoiceItem() {
                var invoiceItems = document.getElementById('invoice_items');
                var newItem = document.createElement('div');
                newItem.innerHTML = ` <div class= "form-group row">
                    <div class= "col">
                        <label for="Description">Description</label>
                        <input type="text" class="form-control" name="description[]" id="description" required>
                    </div>
                    <div class="col">
                        <label for="Amount">Amount</label>
                        <input  type="number" class="form-control"  step="0.01" name="amount[]" id="amount" required>
                    </div>
                    </div>
                `;
                invoiceItems.appendChild(newItem);
            }
        </script>
      </div>
    </div>
  </div>
  @include('components.footer')
