<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<title>read</title>
</head>
<style>
        .dt-buttons {
            margin: 10px 0;
        }

        .dt-buttons .btn {
            background-color: #4CAF50; /* Green background */
            color: white;               /* White text */
            padding: 8px 16px;          /* Some padding */
            border-radius: 4px;         /* Rounded corners */
            border: none;               /* Remove border */
            margin-right: 5px;          /* Space between buttons */
            cursor: pointer;           /* Pointer cursor */
        }

        .dt-buttons .btn:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .dt-buttons .btn:active {
            background-color: #3e8e41; /* Even darker on click */
        }

        /* Specific button types */
        .dt-buttons .buttons-copy {
            background-color: #2196F3; /* Blue */
        }
        
        .dt-buttons .buttons-print {
            background-color: #FF5722; /* Red */
        }

        .dt-buttons .buttons-pdf {
            background-color: #FF9800; /* Orange */
        }

        .dt-buttons .buttons-excel {
            background-color: #8BC34A; /* Green */
        }

        .dt-buttons .buttons-csv {
            background-color: #9E9E9E; /* Gray */
        }
        
    </style>
<body>
    <?php
    require("connection.php");
    $select = "SELECT * FROM `pro` ";
    $query = mysqli_query($connect,$select);
    if(mysqli_num_rows($query)){
    ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="alert alert-primary">
                <h1 class="text-center">READ</h1>
            </div>
    <table class="table table-primary table-striped" id="myTable">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php while($data = mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?php echo $data['ID']; ?></td>
                <td><?php echo $data['Name']; ?></td>
                <td><?php echo $data['Email']; ?></td>
                <td><?php echo $data['Password']; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $data['ID']; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you syre you want to delete this one.')">Delete</a>
                    <a href="update.php?id=<?php echo $data['ID']; ?>" class="btn btn-outline-warning">Update</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
<?php } else { ?>
    <div class="container mt-3">
        <div class="alert alert-warning">
            <h4 class="text-center">No records found</h4>
        </div>
    </div>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/3.2.0/js/dataTables.buttons.min.js" integrity="sha512-/iOthDtoEAAT8XBHzVM0DDacmcGS/3C2QRrGW5Q10S3W8RpeEbK65/WBdjeJtmzVcg1dAwnDceqCuP92HV4Kyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/3.2.0/js/buttons.colVis.min.js" integrity="sha512-Aco2AZMfg/w1xDL6ym1XZa0ghs/l66pUEOmmhQJ0Pd5BmgDgNWUncB1wyUO6dRm7MDf5WvO7AhKGtBfb+sYmgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/3.2.0/js/buttons.html5.min.js" integrity="sha512-OrwOX7sUH8/wOI5I8G+Xy0Q5lIM+BT05blMElksG0FPlWDfjrAOkt5TH0PzTnblD0kJgIlC4KvaRTfPtXsNlGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/3.2.0/js/buttons.print.min.js" integrity="sha512-2Z5DG21Mo9I7ETDi1R4T5yK24NDuxcRCD6smo47+kImienWgFdBU5mg0cyLGaMwDitjb9UskfUEtji67if3Xnw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/vfs_fonts.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<script>
        $(document).ready(function(){
        $('#myTable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            dom: 'Blftrip',
            // buttons: ['copy','print','pdf','excel','csv']
        });
    });
</script>
<!-- link -->

</body>
</html>