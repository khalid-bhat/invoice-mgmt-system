@include('components.header')
        <div class="main-panel">
<div class="col-sm-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        {{-- <object data= ../../../public/{{ $filename }} type=”application/pdf” width=”100%” height=”100%”> --}}
            <iframe src="../../{{$pdfPath}}" style="width: 100%; height: 500px;"></iframe>
    </div>
  </div>
</div>
  @include('components.footer')
