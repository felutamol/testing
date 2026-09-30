<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Mahasiswa</title>
    <link rel="stylesheet" href="loginapp.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Mahasiswa</h2>
        <table>
            <tr>
                <th>No</th>
                <th>NRP</th>
                <th>Nama</th>
            </tr>
            <tr>
                <td>1</td>
                <td>3126001</td>
                <td>Andi</td>
            </tr>
            <tr>
                <td>2</td>
                <td><?php echo $_POST['nrp']; ?></td>
                <td><?php echo $_POST['nama']; ?></td>
            </tr>
        </table>
    </div>

</body>
</html>