<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

  <link rel="shortcut icon" href="images/bear-head.png" type="image/png">
  <title>Data Motor</title>

</head>
<body>
<div class="container mt-5">
<div class="card">
<br/>
<center> <h1>Dealer Motor Sejahtera</h1> </center>
<br/>
    <div class="container p-4">
    <a href="{{ route('motors.create') }}" class="btn btn-md btn-primary mb-3">Tambah Data</a>
    <a href="{{ url('/home') }}" class="btn btn-md btn-danger mb-3 float-right">Kembali</a>
        <table id="myTable" class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th onclick="sortTable(1)">Nama Motor</th>
            <th onclick="sortTable(2)">Plat Motor</th>
            <th onclick="sortTable(3)">Harga Motor</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
    @forelse ($motors as $motor)
    <tr>
            <!-- <td>{{ $motor->id }}</td> -->
            <!-- <td>{{ $motors->count() * ($motors->currentPage() - 1) + $loop->iteration }}</td> -->
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $motor->NamaMotor }}</td>
            <td>{{ $motor->PlatNomor }}</td>
            <td>{{ $motor->HargaMotor }}</td>
                <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('motors.destroy', $motor->id) }}" method="POST">
                <a href="{{ route('motors.edit', $motor->id) }}" class="btn btn btn-success">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">delete</button>
                </td>
            </td>
            </tr>
    @empty
        <div class="alert alert-danger">
            Data motor belum Tersedia.
        </div>
    @endforelse
        </table>
        <div class="halaman">
        {{ $motors->links() }}
        </div>
               
    </div>
  </div>
</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

    <script>
        @if(session()->has('success'))
        
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
        @endif
    </script>
</body>
</html>
