<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Invoice List </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <a href="{{route('invoice.create')}}">   <button type="button" class="btn btn-outline-secondary">
                    <i class="mdi mdi-plus d-block mb-1"></i> Add Invoice</button></a>
            </ol>
          </nav>
      </div>
    <div class="row">
      <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Invoices </h4>
            </p>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice['number'] }}</td>
                        <td>{{ $invoice['date'] }}</td>
                        <td>{{ $invoice['address'] }}</td>
                        <td><div class="btn-group" role="group" aria-label="Basic example">
                           <a href="{{url('invoices/'.$invoice->id.'/pdf')}}"> <button type="button" class="btn btn-outline-secondary">
                              <i class="mdi mdi-eye d-block mb-1"></i> Display </button></a>
                           <a href="{{url('send-invoice/'.$invoice->id)}}"> <button type="button" class="btn btn-outline-secondary">
                              <i class="mdi mdi-send d-block mb-1"></i> Mail </button></a>

                          </div></td>
                    </tr>
                @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
