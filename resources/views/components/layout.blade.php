{{-- We can reduce duplication code by using components.
In this example we have used components to lay out the header and
footer in one file. This header is also made dynamic by using the
auth directive to determine wether the user is logged in or not. --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <title>Poecilia Nederland</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/main.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.jpeg') }}">
    
    @vite(['resources/js/app.js'])
  </head>
  <body>
    <header class="header-bar mb-3">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white"><strong>Poecilia Nederland</strong></a></h4>
        @auth
        <div class="flex-row my-3 my-md-0">
            {{-- <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
            <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span> --}}
            {{-- <a href="/profile/{{ auth()->user()->lidnummer }}" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a> --}}
            {{-- <a href="/profiel/{{ auth()->user()->lidnummer }}" class="mr-2"><img title="Profiel" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a> --}}
            {{-- <a class="btn btn-sm btn-success mr-2" href="/create-post">Example project create post</a> --}}
            <a style="width: 120px" class="btn btn-sm btn-success mr-2" href="/profiel/{{ auth()->user()->lidnummer }}">Profiel</a>
            <a style="width: 120px" class="btn btn-sm btn-success mr-2" href="/visregistratie">Visregistratie</a>
            <a style="width: 120px" class="btn btn-sm btn-success mr-2" href="/table-all">Overzicht</a>
            @if (auth()->user()->isAdmin == 1)
            <a style="width: 120px"class="btn btn-sm btn-success mr-2" href="/beheerder">Beheerder</a>
            @endif

            <form action="/logout" method="POST" class="d-inline">
                @csrf
              <button style="width: 120px"class="btn btn-sm btn-secondary">Uitloggen</button>
            </form>
          </div>
        @else
        <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
            @csrf
              <div class="row align-items-center">
                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="loginemail" class="form-control form-control-sm input-dark" type="text" placeholder="Email" autocomplete="on" name="loginemail" value="{{ old('loginemail') }}" />
                </div>
                <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                  <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
                </div>
                <div class="col-md-auto">
                  <button class="btn btn-success btn-sm">Log In</button>
                </div>
                <a href="/forgot-password" style="color: white">Wachtwoord vergeten?</a>
              </div>
            </form>
        @endauth
        
      </div>
    </header>
    <!-- header ends here -->

    @if (session()->has('success'))
        <div class="container container--narrow">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('error'))
    <div class="container container--narrow">
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    </div>
    @endif

    {{ $slot }}

    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; 2023 - {{ date('Y') }} <a href="dekkerweb.com" class="text-muted"><em>Dekkerweb.com</em></a>. All rights reserved.</p>
      </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
    $('[data-toggle="tooltip"]').tooltip()
    </script>

    <script src="
      https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js
    "></script>
     <script>
      
      console.log('hello :)');

      // Export table data to Excel file
      var btnXlsx = document.querySelectorAll('.action button')[0];
      var btnXls = document.querySelectorAll('.action button')[1];
      var btnCvs = document.querySelectorAll('.action button')[2];

      btnXlsx.onclick = () => exportData('xlsx');
      btnXls.onclick = () => exportData('xls');
      btnCvs.onclick = () => exportData('csv');

      function exportData(type) {
        
          const fileName = 'exported-sheet.' + type;
          const table = document.getElementById("tableAll");
          const wb = XLSX.utils.table_to_book(table);
          XLSX.writeFile(wb, fileName); 
      }

      // Search through table data
      function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }

      // Search through table data
      function searchFunctionTableAll() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableAll");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) { // start from 1 to skip table header
        tr[i].style.display = "none"; // initially hide all rows
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = ""; // show the row if match is found
                    break; // stop checking other cells in the same row
                }
            }
        }
    }
}

function searchFunctionTableUser() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableUser");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) { // start from 1 to skip table header
        tr[i].style.display = "none"; // initially hide all rows
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = ""; // show the row if match is found
                    break; // stop checking other cells in the same row
                }
            }
        }
    }
}

        function sortTableUser(n) {
          var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
          table = document.getElementById("tableUser");
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
                        shouldSwitch = true;
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
                switchcount++;
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

    function sortAll(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("tableAll");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc"; 
    // Make a loop that will continue until no switching has been done:
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        // Loop through all table rows (except the first, which contains table headers):
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            // Get the two elements you want to compare, one from current row and one from the next:
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            // Check if the two rows should switch place, based on the direction, asc or desc:
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            // If a switch has been marked, make the switch and mark that a switch has been done:
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            // If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again:
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('.clickable-row');
    rows.forEach(function(row) {
        row.addEventListener('click', function() {
            window.location.href = row.dataset.href;
        });
    });
});

    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>


  </body>
</html>