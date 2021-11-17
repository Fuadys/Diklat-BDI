<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- data table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <?php
    if (session()->has('success') == "Data Updated Successfully") {
        echo "
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            
            Toast.fire({
                icon: 'success',
                title: '" . session()->getFlashdata('success') . "'
            })
        </script>
        ";
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Dosen</h5>
                    <a href="<?= base_url('dosen/tambah') ?>" class="d-sm-flex mb-3"> <button type="button" class="btn btn-primary">Tambah Dosen</button></a>
                    <table class="table" id="tables">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">id</th>
                                <th scope="col">Nip</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis kelamin</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Gaji</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $i => $d) {
                            ?>
                                <tr>
                                    <td width="30" class="text-center"><?= $i + 1; ?></td>
                                    <td><?= $d['id']; ?></td>
                                    <td><?= $d['nip']; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['jenis_kelamin']; ?></td>
                                    <td><?= $d['golongan']; ?></td>
                                    <td><?= $d['gaji']; ?></td>
                                    <td class="">
                                        <a href="<?= base_url('dosen/edit/' . $d['id']) ?>" class="btn btn-warning">Edit</a>
                                        <!-- USING SWEETALERT -->
                                        <!-- <a onclick="delete" href=""> -->
                                        <button onclick='validation(<?= $d["id"]; ?>)' type="button" class="btn btn-danger">Delete</button>
                                        <!-- </a> -->
                                        <script>
                                            const swalWithBootstrapButtons = Swal.mixin({
                                                customClass: {
                                                    confirmButton: 'btn btn-success',
                                                    cancelButton: 'btn btn-danger'
                                                },
                                                buttonsStyling: false
                                            })

                                            // document.querySelector(".delete").addEventListener('click', function(){
                                            //     Swal.fire("Our First Alert");
                                            // });

                                            function validation(params) {

                                                swalWithBootstrapButtons.fire({
                                                    title: 'Are you sure?',
                                                    text: "You won't be able to revert this!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Yes, delete it!',
                                                    cancelButtonText: 'No, cancel!',
                                                    reverseButtons: true
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // swalWithBootstrapButtons.fire(
                                                        //     'Deleted!',
                                                        //     'Your file has been deleted.',
                                                        //     'success'
                                                        // );
                                                        window.location.href = "<?= base_url('dosen/delete/') ?>/" + params;
                                                    } else if (
                                                        /* Read more about handling dismissals below */
                                                        result.dismiss === Swal.DismissReason.cancel
                                                    ) {
                                                        swalWithBootstrapButtons.fire(
                                                            'Cancelled',
                                                            'Your imaginary file is safe :)',
                                                            'error'
                                                        )
                                                    }
                                                })
                                            };
                                        </script>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        $(document).ready(function() {
            $('#tables').DataTable();
        });
    </script>

</body>

</html>