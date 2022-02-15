<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
        .page
        {           
            padding:2cm;
        }
        table
        {
            border-spacing:0;
            border-collapse: collapse; 
            width:100%;
        }

        table td, table th
        {
            border: 1px solid #ccc;
        }
		
		table th
        {
            background-color:red;
        }
    </style>
</head>
<body>	
    <div class="page">	
        <h1>Data Buku</h1>
        <table border="0">
        <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Rak</th>
        </tr>
        <?php
        $no = 1;
        foreach($dataProvider->getModels() as $buku){ 
        ?>
        <tr>
                <td><?= $no++ ?></td>
                <td><?= $buku->judul ?></td>
                <td><?= $buku->pengarang ?></td>
                <td><?= $buku->penerbit->nama_penerbit ?></td>
                <td><?= $buku->tahun_terbit ?></td>
                <td><?= $buku->rak->nama_rak ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>