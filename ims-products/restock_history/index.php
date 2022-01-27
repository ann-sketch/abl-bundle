<?php
include "../../env.php";
$query = "SELECT * FROM `restock_history` ORDER BY ID DESC";
$result = mysqli_query($ims_products_connect, $query); 
?>

<!DOCTYPE html>
<html>

<head>
  <title>Adonko Bitters Ltd</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css" />

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
  <script>
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[2]);

        if (
          (min === null && max === null) ||
          (min === null && date <= max) ||
          (min <= date && max === null) ||
          (min <= date && date <= max)
        ) {
          return true;
        }
        return false;
      }
    );

    $(document).ready(function() {
      // Create date inputs
      minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
      });
      maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
      });

      // DataTables initialisation
      var table = $('#employee_data').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

      // Refilter the table
      $('#min, #max').on('change', function() {
        table.draw();
      });
    });
  </script>
</head>

<body>
  <br /><br />
  <div class="container">
    <h2 align="center">Adonko Bitters Ltd</h2>
    <hr>
    <h5 align="center">Restock History</h5>
    <hr>
    <table border="0" cellspacing="5" cellpadding="5">
      <tbody>
        <tr>
          <td>Starting date:</td>
          <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
          <td>Ending date:</td>
          <td><input type="text" id="max" name="max"></td>
        </tr>
      </tbody>
    </table>
    <div class="table-responsive">
      <table id="employee_data" class="table table-striped table-bordered">
        <thead>
          <tr>
            <td>Item</td>
            <td>Description</td>
            <td>Timestamp</td>
          </tr>
        </thead>
        <?php
        if ($result === false) {
          echo "Error: " . $query . "<br>" . $connect->error;
        } else {
          while ($row = mysqli_fetch_array($result)) {
            $row["item"] = $row["item"] ?: "---";
            $row['description'] = $row["description"] ?: "---";
            $row["timestamp"] = $row["timestamp"] ?: "---";

            echo '  
                                   <tr>  
                                        <td>' . $row["item"] . '</td>  
                                        <td>' . $row["description"]  . '</td>  
                                        <td>' . $row["timestamp"] . '</td>  
                                   </tr>  
                                   ';
          }
        }

        ?>
      </table>
    </div>
  </div>
</body>

</html>