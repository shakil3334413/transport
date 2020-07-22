<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="swadeshparibahan.com swadeshparibahan.net swadeshparibahan  swadesh Ltd Management System LtdManagementSystem">
  <meta name="keywords" content="swadeshparibahan.com swadeshparibahan.net swadeshparibahan swadesh Ltd Management System LtdManagementSystem">
  <meta name="author" content="swadeshparibahan swadesh">
  <link href="{{asset('admin/img/favicon.png')}}" rel="shortcut icon">
  <link href="{{asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <!-- /meta tags -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>পরিবহন</title>
    <style> 
      @media print {
    /* style sheet for print goes here */
        .noprint {
          visibility: hidden;
        }
        .table tr{
            border: 1px solid #000;
        }
      }
      .table td, .table th {
        padding: .5rem;
        vertical-align: top;
        border: 1px solid #000;
        font-size: 15px;
      }
    </style>
</head>
<body>
    <div class="container">
       <div class="row">
            <div class="col-md-12 text-center mt-5">
                <h4>আজকের লাইনম্যান  এর বেতন এর লিস্ট </h4>
                <h6>পরিবহন <button onclick="myFunction()" class="btn btn-success btn-sm noprint float-right">Print</button><input type="button" class="btn btn-primary noprint btn-sm float-right mr-2"  id="btnExport" value="PDF" onclick="Export()" /></h6>
            </div>
            <div class="col-md-12 text-right">
                <p>Print at:&nbsp;{{ Carbon\Carbon::parse($currentDatetime)->format('d-M-Y g:i:s A') }}</p>
                
            </div>
            <div class="col-md-12 mt-2">
                <table id="tblCustomers" class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th scope="col">ক্রমিক  নং</th>
                        <th scope="col">তারিখ </th>
                        <th scope="col">লাইনম্যান নাম</th>
                        <th scope="col">কাউন্টার নাম</th>
                        <th scope="col">শিফট</th>
                        <th scope="col">বেতন</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $count=0;
                        @endphp
                 @foreach ($linemansalary as $linemansalarys)
                      <tr>
                          <th scope="row">{{ $count+=1 }}</th>
                        <td>{{ Carbon\Carbon::parse($linemansalarys->created_at)->format('d-M-Y') }}</td>
                        <td>{{$linemansalarys->name}}</td>
                        <td>{{$linemansalarys->counter_name}}</td>
                        <td>{{$linemansalarys->shift}}</td>
                        <td>{{$linemansalarys->taka}}&nbsp;টাকা</td>
                      </tr>
                @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" class="font-weight-bold">মোট:</td>
                        <td class="font-weight-bold">{{$counttaka}}&nbsp;টাকা</td>
                    </tr>
                    </tbody>
                  </table>
            </div>
       </div>
    </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>
    function myFunction() {
      window.print();
    }
</script>
<script type="text/javascript">
  function Export() {
      html2canvas(document.getElementById('tblCustomers'), {
          onrendered: function (canvas) {
              var data = canvas.toDataURL();
              var docDefinition = {
                  content: [{
                      image: data,
                      width: 500
                  }]
              };
              pdfMake.createPdf(docDefinition).download("Table.pdf");
          }
      });
  }
</script>
</html>